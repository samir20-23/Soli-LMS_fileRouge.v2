<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    protected $fillable = ['nom', 'type', 'description', 'utilisateur_id'];
    
    public function categorie()
{
    return $this->belongsTo(Categorie::class);
}

public function utilisateur()
{
    return $this->belongsTo(Utilisateur::class);
}

}
