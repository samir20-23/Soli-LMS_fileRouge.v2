<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtilisateurSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('utilisateurs')->delete(); // Delete all rows
    
        DB::table('utilisateurs')->insert([
            [
                'nom' => 'John Doe',
                'email' => 'john@example.com',
                'role' => 'Utilisateur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Jane Smith',
                'email' => 'jane@example.com',
                'role' => 'Utilisateur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
    
    
}
