<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\History;
use App\Models\Quiz;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $coursesData = [
            [
                'name_course' => 'PHP',
                'description' => 'Curso de PHP',
                'quiz_count' => 2,
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg',
                'quizzes' => [
                    [
                        'question' => 'O que é uma variável em PHP?',
                        'option' => 'Uma área de armazenamento',
                        'correct_answer' => 'Uma área de armazenamento',
                        'topic' => 'Variáveis',
                        'score' => 10,
                    ],
                    [
                        'question' => 'Como declarar uma função em PHP?',
                        'option' => 'function minhaFuncao() {}',
                        'correct_answer' => 'function minhaFuncao() {}',
                        'topic' => 'Funções',
                        'score' => 10,
                    ],
                ],
            ],
            [
                'name_course' => 'JavaScript',
                'description' => 'Curso de JavaScript',
                'quiz_count' => 2,
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png',
                'quizzes' => [
                    [
                        'question' => 'Como declarar uma função em JavaScript?',
                        'option' => 'function minhaFuncao() {}',
                        'correct_answer' => 'function minhaFuncao() {}',
                        'topic' => 'Funções',
                        'score' => 10,
                    ],
                    [
                        'question' => 'O que é uma variável em JavaScript?',
                        'option' => 'let x = 10;',
                        'correct_answer' => 'let x = 10;',
                        'topic' => 'Variáveis',
                        'score' => 10,
                    ],
                ],
            ],
            // Adicione outros cursos e quizzes conforme necessário
        ];

            foreach ($coursesData as $courseData) {
            $course = Course::create([
                'name_course' => $courseData['name_course'],
                'description' => $courseData['description'],
                'quiz_count' => $courseData['quiz_count'],
                'user_id' => $user->id,
                'image_url' => $courseData['image_url'],
            ]);

            foreach ($courseData['quizzes'] as $quizData) {
                $quiz = Quiz::create(array_merge($quizData, [
                    'course_id' => $course->id,
                ]));

                History::create([
                    'user_id' => $user->id,
                    'quiz_id' => $quiz->id,
                    'score_obtained' => rand(70, 100), // Pontuação aleatória para exemplo
                    'completed_at' => now(),
                ]);
            }
        }
    }
}