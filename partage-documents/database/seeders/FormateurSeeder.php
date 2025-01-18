<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormateurSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('utilisateurs')->insert([
            ['nom' => 'Alice Trainer', 'email' => 'alice@example.com', 'role' => 'Formateur', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Bob Mentor', 'email' => 'bob@example.com', 'role' => 'Formateur', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
