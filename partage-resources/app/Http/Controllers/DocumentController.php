<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function upload(Request $request)
    {
        // Validate and upload the file
        $request->validate([
            'document' => 'required|file|mimes:pdf,docx,txt|max:10240',
        ]);

        $file = $request->file('document');
        $path = $file->storeAs('documents', $file->getClientOriginalName());

        Document::create([
            'titre' => $file->getClientOriginalName(),
            'chemin_fichier' => $path,
        ]);

        return redirect()->route('documents.index');
    }

    public function index()
    {
        $documents = Document::all();
        return view('documents.index', compact('documents'));
    }
}
