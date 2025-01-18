<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorieSeeder::class,
            UtilisateurSeeder::class,
            FormateurSeeder::class,
            DocumentSeeder::class,
            RessourceSeeder::class,
        ]);
    }
}
