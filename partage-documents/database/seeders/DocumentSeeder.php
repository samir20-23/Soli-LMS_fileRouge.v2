<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('documents')->insert([
            [
                'title' => 'Document 1',
                'chemin_fichier' => 'uploads/doc1.pdf',
                'Validation' => 'Pending',
                'date_telechargement' => now(),
                'etat_validation' => 'En attente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Document 2',
                'chemin_fichier' => 'uploads/doc2.pdf',
                'Validation' => 'Approved',
                'date_telechargement' => now(),
                'etat_validation' => 'Validé',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
