<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['nom' => 'Education', 'description' => 'Educational materials', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Technology', 'description' => 'Technical resources', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
