<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RendezVousController;

Route::get('/', fn() => view('pages.accueil'));
Route::get('/informations-patients', fn() => view('pages.informations-patients'))->name('infos');
Route::get('/actualites', fn() => view('pages.actualites'))->name('actualites');

Route::post('/rdv', [RendezVousController::class, 'store'])->name('rdv.store');