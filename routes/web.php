<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', fn() => view('pages.accueil'));
Route::get('/informations-patients', fn() => view('pages.informations-patients'))->name('infos');
Route::get('/actualites', fn() => view('pages.actualites'))->name('actualites');


Route::post('/rdv', function (Request $request) {
    $data = $request->validate([
        'specialite' => 'required|string',
        'medecin'    => 'required|string',
        'date'       => 'required|date',
        'creneau'    => 'required|string',
    ]);
    return back()->with('success',
        "Demande reçue : {$data['specialite']} le {$data['date']} ({$data['creneau']}). Nous vous recontacterons pour confirmer."
    );
})->name('rdv.store');