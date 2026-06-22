<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\RendezVous;

Route::get('/', fn() => view('pages.accueil'));
Route::get('/informations-patients', fn() => view('pages.informations-patients'))->name('infos');
Route::get('/actualites', fn() => view('pages.actualites'))->name('actualites');


Route::post('/rdv', function (Request $request) {
    $data = $request->validate([
    'nom'        => 'required|string|max:100',
    'prenom'     => 'required|string|max:100',
    'email'      => 'required|email|max:150',
    'telephone'  => 'required|string|max:30',
    'type'       => 'required|in:consultation,urgence,tele',
    'specialite' => 'required|string',
    'medecin'    => 'required|string',
    'date'       => 'required|date',
    'creneau'    => 'required|string',
    'motif'      => 'nullable|string|max:1000',
]);
    RendezVous::create($data);
    
    return back()->with('success',
        "Demande reçue : {$data['specialite']} le {$data['date']} ({$data['creneau']}). Nous vous recontacterons pour confirmer."
    );
})->name('rdv.store');