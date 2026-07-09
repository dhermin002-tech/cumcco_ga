<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\MedecinController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActualiteController;

// ─── Site public ───
    Route::get('/', function () {
    $medecins = \App\Models\Medecin::where('actif', true)->orderBy('nom')->get();
    $specialites = \App\Models\Medecin::where('actif', true)->distinct()->orderBy('specialite')->pluck('specialite');
    return view('pages.accueil', ['medecins' => $medecins, 'specialites' => $specialites]);
});
    Route::get('/informations-patients', fn() => view('pages.informations-patients'))->name('infos');
    Route::get('/actualites', function () {
        $articles = \App\Models\Actualite::orderBy('date_publication', 'desc')->get();
        return view('pages.actualites', ['articles' => $articles]);
    })->name('actualites');
    Route::get('/actualites/{actualite}', [ActualiteController::class, 'show'])->name('actualites.show');
    Route::post('/rdv', [RendezVousController::class, 'store'])->name('rdv.store');


// ─── Espace authentifié (Breeze) ───
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
    // Profil (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Administration
    Route::get('/admin/medecins', [MedecinController::class, 'index'])->name('admin.medecins.index');
    Route::get('/admin/medecins/create', [MedecinController::class, 'create'])->name('admin.medecins.create');
    Route::post('/admin/medecins', [MedecinController::class, 'store'])->name('admin.medecins.store');
    Route::patch('/admin/medecins/{medecin}/toggle', [MedecinController::class, 'toggle'])->name('admin.medecins.toggle');
    Route::delete('/admin/medecins/{medecin}', [MedecinController::class, 'destroy'])->name('admin.medecins.destroy');
    Route::get('/admin/medecins/{medecin}/edit', [MedecinController::class, 'edit'])->name('admin.medecins.edit');
    Route::patch('/admin/medecins/{medecin}', [MedecinController::class, 'update'])->name('admin.medecins.update');
    Route::get('/admin/rendez-vous', [RendezVousController::class, 'index'])->name('admin.rendezvous.index');
    Route::patch('/admin/rendez-vous/{id}/statut', [RendezVousController::class, 'updateStatut'])->name('admin.rendezvous.statut');

    // Actualités (réservées à l'admin uniquement)
    Route::get('/admin/actualites', [ActualiteController::class, 'index'])->name('admin.actualites.index');
    Route::get('/admin/actualites/create', [ActualiteController::class, 'create'])->name('admin.actualites.create');
    Route::post('/admin/actualites', [ActualiteController::class, 'store'])->name('admin.actualites.store');
    Route::get('/admin/actualites/{actualite}/edit', [ActualiteController::class, 'edit'])->name('admin.actualites.edit');
    Route::patch('/admin/actualites/{actualite}', [ActualiteController::class, 'update'])->name('admin.actualites.update');
    Route::delete('/admin/actualites/{actualite}', [ActualiteController::class, 'destroy'])->name('admin.actualites.destroy');
});

require __DIR__.'/auth.php';