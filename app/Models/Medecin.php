<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    protected $fillable = ['nom', 'specialite', 'actif', 'jours_horaires'];
}