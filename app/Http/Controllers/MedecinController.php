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
}