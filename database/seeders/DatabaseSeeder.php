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
                'description' => 'Uma linguagem para backend web',
                'quiz_count' => 2,
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg',
                'quizzes' => [
                    [
                        'topic' => 'Variáveis',
                        'question' => 'Qual destas é a forma correta de declarar uma variável em PHP?',
                        'option_a' => '$variavel = 10;',
                        'option_b' => 'var variavel = 10;',
                        'option_c' => 'let variavel = 10;',
                        'option_d' => 'variavel := 10;',
                        'correct_option' => 'a',
                        'score' => 10,
                    ],
                    [
                        'topic' => 'Funções',
                        'question' => 'Como declarar uma função em PHP?',
                        'option_a' => 'function minhaFuncao() {}',
                        'option_b' => 'def minhaFuncao() {}',
                        'option_c' => 'fun minhaFuncao() {}',
                        'option_d' => 'function: minhaFuncao() {}',
                        'correct_option' => 'a',
                        'score' => 10,
                    ],
                ],
            ],
            [
                'name_course' => 'NodeJs',
                'description' => 'Curso para iniciantes em backend',
                'quiz_count' => 3,
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/d/d9/Node.js_logo.svg',
                'quizzes' => [],
            ],
            [
                'name_course' => 'JavaScript',
                'description' => 'Linguagem dinâmica para web',
                'quiz_count' => 2,
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png',
                'quizzes' => [
                    [
                        'topic' => 'Funções',
                        'question' => 'Como declarar uma função em JavaScript?',
                        'option_a' => 'function minhaFuncao() {}',
                        'option_b' => 'def minhaFuncao() {}',
                        'option_c' => 'fun minhaFuncao() {}',
                        'option_d' => 'function: minhaFuncao() {}',
                        'correct_option' => 'a',
                        'score' => 10,
                    ],
                    [
                        'topic' => 'Variáveis',
                        'question' => 'O que é uma variável em JavaScript?',
                        'option_a' => 'let x = 10;',
                        'option_b' => 'var x = 10;',
                        'option_c' => 'const x = 10;',
                        'option_d' => 'x := 10;',
                        'correct_option' => 'a',
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
                    'score_obtained' => rand(70, 100), // Simula uma pontuação aleatória
                    'completed_at' => now(),
                ]);
            }
        }
    }
}