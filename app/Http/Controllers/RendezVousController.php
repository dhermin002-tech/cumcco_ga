<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RendezVous;   
use Illuminate\Support\Facades\Mail;
use App\Mail\RendezVousAccepte;

class RendezVousController extends Controller
{
    public function store(Request $request)
    {
        $dateMin = $request->input('type') === 'urgence'
            ? date('Y-m-d')                              
            : date('Y-m-d', strtotime('+3 days'));      

        $data = $request->validate([
            'nom'        => 'required|string|max:100',
            'prenom'     => 'required|string|max:100',
            'email'      => 'required|email|max:150',
            'telephone'  => ['required', 'string', 'max:30', 'regex:/^[0-9+\s().-]+$/'],
            'type'       => 'required|in:consultation,urgence,tele',
            'specialite' => 'required|string',
            'medecin'    => 'required|string',
            'date'       => 'required|date|after_or_equal:' . $dateMin . '|before_or_equal:' . date('Y-m-d', strtotime('+30 days')),
            'creneau'    => 'required|string',
            'motif'      => 'nullable|string|max:1000',
        ]);

        RendezVous::create($data);

        return back()->with('success',
            "Demande reçue : {$data['specialite']} le {$data['date']} ({$data['creneau']}). Nous vous recontacterons pour confirmer."
        );
    }
    public function index()
    {
        $rendezvous = RendezVous::orderBy('date')->paginate(20);

        return view('admin.rendezvous.index', ['rendezvous' => $rendezvous]);
    }

    public function updateStatut(Request $request, $id)
    {
        $data = $request->validate([
            'statut' => 'required|in:en_attente,accepte,refuse,annule',
        ]);

        $rdv = RendezVous::findOrFail($id);
        $rdv->update(['statut' => $data['statut']]);

        if ($data['statut'] === 'accepte') {
            Mail::to($rdv->email)->send(new RendezVousAccepte($rdv));
        }

        return redirect()->route('admin.rendezvous.index')->with('success', 'Statut mis à jour.');
    }
    
}
