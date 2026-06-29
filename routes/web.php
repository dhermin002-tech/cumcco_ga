<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\MedecinController;
use Illuminate\Support\Facades\Route;

// ─── Site public ───
Route::get('/', fn() => view('pages.accueil'));
Route::get('/informations-patients', fn() => view('pages.informations-patients'))->name('infos');
Route::get('/actualites', fn() => view('pages.actualites'))->name('actualites');
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
});

require __DIR__.'/auth.php';