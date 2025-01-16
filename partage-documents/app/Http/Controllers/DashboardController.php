<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Ressource;
use App\Models\Formateur;
use App\Models\Utilisateur;
use App\Models\Categorie;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
        
        $totalDocuments = Document::count();
        $totalRessources = Ressource::count();
        $documents = Document::all();
        $ressources = Ressource::all();
        return view('dashboard', compact('documents', 'ressources','totalDocuments', 'totalRessources'));
    }
    
    
    
}
