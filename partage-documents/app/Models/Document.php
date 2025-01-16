<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'chemin_fichier', 'Validation', 'date_telechargement', 'etat_validation', 'created_at', 'updated_at'];
    
    public function categorie()
{
    return $this->belongsTo(Categorie::class);
}

public function utilisateur()
{

    return $this->belongsTo(Utilisateur::class);
}

}
