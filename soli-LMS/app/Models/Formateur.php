<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Utilisateur
{
    use HasFactory;

    public function ressources()
    {
        return $this->hasMany(Ressource::class);
    }
}
