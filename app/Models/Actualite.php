<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    protected $fillable = [
        'titre',
        'categorie',
        'extrait',
        'contenu',
        'image',
        'date_publication',
    ];
}