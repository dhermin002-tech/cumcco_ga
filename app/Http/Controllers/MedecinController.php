<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecin;

class MedecinController extends Controller
{
    public function index(Request $request)
    {
        $query = Medecin::query();

        // Filtre par statut
        if ($request->filled('statut')) {
            if ($request->statut === 'actif') {
                $query->where('actif', true);
            } elseif ($request->statut === 'suspendu') {
                $query->where('actif', false);
            }
        }

        // Filtre par spécialité
        if ($request->filled('specialite')) {
            $query->where('specialite', $request->specialite);
        }

        // Recherche par nom
        if ($request->filled('recherche')) {
            $query->where('nom', 'like', '%' . $request->recherche . '%');
        }

        $medecins = $query->orderBy('nom')->get();

        // Liste des spécialités pour le menu déroulant du filtre
        $specialites = Medecin::distinct()->orderBy('specialite')->pluck('specialite');

        return view('admin.medecins.index', [
            'medecins' => $medecins,
            'specialites' => $specialites,
        ]);
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

    public function destroy(Medecin $medecin)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $medecin->delete();

        return redirect()->route('admin.medecins.index')->with('success', 'Médecin supprimé.');
    }

    public function edit(Medecin $medecin)
    {
        return view('admin.medecins.edit', ['medecin' => $medecin]);
    }

    public function update(Request $request, Medecin $medecin)
    {
        $data = $request->validate([
            'nom'            => 'required|string|max:150',
            'specialite'     => 'required|string|max:150',
            'jours_horaires' => 'nullable|string|max:500',
        ]);

        $medecin->update($data);

        return redirect()->route('admin.medecins.index')->with('success', 'Médecin modifié avec succès.');
    }
}