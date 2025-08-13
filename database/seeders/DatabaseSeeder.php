<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;

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

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Course::create([
            'name_course' => 'PHP',
            'description' => 'Curso de PHP',
            'quiz_count' => 5,
            'user_id' => $user->id,
            'image_url' => '/images/php.png',
        ]);

        Course::create([
            'name_course' => 'JavaScript',
            'description' => 'Curso de JavaScript',
            'quiz_count' => 5,
            'user_id' => $user->id,
            'image_url' => '/images/js.png',
        ]);

        Course::create([
            'name_course' => 'NodeJS',
            'description' => 'Curso de JavaScript FrameWork',
            'quiz_count' => 7,
            'user_id' => $user->id,
            'image_url' => '/images/node.png',
        ]);

        
        Course::create([
            'name_course' => 'React',
            'description' => 'Curso de JavaScript FrameWork',
            'quiz_count' => 3,
            'user_id' => $user->id,
            'image_url' => '/images/react.png',
        ]);
        
    }
}
