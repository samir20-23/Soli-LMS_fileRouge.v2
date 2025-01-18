<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $request->validate(['titre' => 'required', 'chemin_fichier' => 'required|file']);
        $filePath = $request->file('chemin_fichier')->store('documents');
    
        Document::create([
            'titre' => $request->titre,
            'chemin_fichier' => $filePath,
            'etat_validation' => 'en_attente',
            'utilisateur_id' => auth()->id(),
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Document uploaded and awaiting approval.');
    }
    
    public function approve(Document $document)
    {
        $document->update(['etat_validation' => 'valide']);
        return back()->with('success', 'Document approved.');
    }
    

    public function edit(Document $document)
    {
        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $document->update($request->all());
        return redirect()->route('documents.index')->with('success', 'Document updated successfully.');
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('documents.index')->with('success', 'Document deleted successfully.');
    }
}
