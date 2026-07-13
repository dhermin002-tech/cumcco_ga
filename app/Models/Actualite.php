<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    public function imageUrl()
    {
        if (! $this->image) {
            return null;
        }

        return Str::startsWith($this->image, 'http')
            ? $this->image
            : asset('storage/' . $this->image);
    }
}