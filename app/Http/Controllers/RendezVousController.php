<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RendezVous;   // ← important : importer le modèle

class RendezVousController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom'        => 'required|string|max:100',
            'prenom'     => 'required|string|max:100',
            'email'      => 'required|email|max:150',
            'telephone'  => ['required', 'string', 'max:30', 'regex:/^[0-9+\s().-]+$/'],
            'type'       => 'required|in:consultation,urgence,tele',
            'specialite' => 'required|string',
            'medecin'    => 'required|string',
            'date' => 'required|date|after_or_equal:' . date('Y-m-d', strtotime('+3 days')) . '|before_or_equal:' . date('Y-m-d', strtotime('+30 days')),
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
}
