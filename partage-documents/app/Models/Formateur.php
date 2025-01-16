<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{

protected $fillable = ['id', 'nom', 'email', 'role', 'created_at', 'updated_at'];
    public function documents()
{
    return $this->hasMany(Document::class);
}

public function ressources()
{
    return $this->hasMany(Ressource::class);
}

}
