<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecin;   // ← importer le modèle

class MedecinController extends Controller
{
    public function index()
    {
        $medecins = Medecin::all();

        return view('admin.medecins.index', ['medecins' => $medecins]);
    }

    public function create()
{
    return view('admin.medecins.create');

}
public function store(Request $request)
{
    $data = $request->validate([
        'nom'            => 'required|string|max:150',
        'specialite'     => 'required|string|max:150',
        'jours_horaires' => 'nullable|string|max:500',
    ]);

    Medecin::create($data);

    return redirect()->route('admin.medecins.index')->with('success', 'Médecin ajouté avec succès.');
}

public function toggle(Medecin $medecin)
{
    $medecin->actif = !$medecin->actif;
    $medecin->save();

    return redirect()->route('admin.medecins.index')->with('success', 'Statut du médecin mis à jour.');
}

}