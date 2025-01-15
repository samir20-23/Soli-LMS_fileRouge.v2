<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'email', 'role'];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function ressources()
    {
        return $this->hasMany(Ressource::class);
    }
}
