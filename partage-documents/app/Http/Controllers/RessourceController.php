<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use Illuminate\Http\Request;
use App\Models\Document; 
use App\Models\Formateur;
use App\Models\Utilisateur;
use App\Models\Categorie;
use App\Models\User;
class RessourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate(['nom' => 'required', 'type' => 'required', 'description' => 'nullable']);
        Ressource::create($request->all() + ['utilisateur_id' => auth()->id()]);
    
        return redirect()->route('dashboard')->with('success', 'Resource created successfully.');
    }
    
    public function update(Request $request, Ressource $ressource)
    {
        $request->validate(['nom' => 'required', 'type' => 'required', 'description' => 'nullable']);
        $ressource->update($request->all());
    
        return back()->with('success', 'Resource updated successfully.');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    
   
    

    /**
     * Display the specified resource.
     */
    public function show(Ressource $ressource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ressource $ressource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ressource $ressource)
    {
        //
    }
}
