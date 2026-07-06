<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    protected $table = 'rendez_vous';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'type',
        'specialite',
        'medecin',
        'date',
        'creneau',
        'motif',
        'statut',
    ];
}