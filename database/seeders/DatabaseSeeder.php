<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        \App\Models\History::create([
            'user_id'      => $user->$id,        // ID do usuário logado
            'language'     => 'PHP',                  // Nome da linguagem
            'theme'        => 'Arrays',               // Tema do quiz
            'score'        => 80,                     // Pontuação obtida
            'completed_at' => now(),                  // Data/hora de conclusão
        ]);

    }
}
