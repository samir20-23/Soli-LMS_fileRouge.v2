<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RessourceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ressources')->insert([
            [
                'nom' => 'Ressource 1',
                'type' => 'Video',
                'description' => 'A useful tutorial video',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Ressource 2',
                'type' => 'PDF',
                'description' => 'An informative PDF guide',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
