<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\History;
use App\Models\Quiz;

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
                        'topic' => 'Variáveis',
                        'question' => 'Como se inicia o nome de uma variável em PHP?',
                        'option_a' => 'Com o símbolo $',
                        'option_b' => 'Com o símbolo @',
                        'option_c' => 'Com o símbolo #',
                        'option_d' => 'Com o símbolo &',
                        'correct_option' => 'a',
                        'score' => 10,
                    ],
                    [
                        'topic' => 'Variáveis',
                        'question' => 'Qual destas variáveis é válida em PHP?',
                        'option_a' => '$nome_usuario',
                        'option_b' => 'nome-usuario',
                        'option_c' => 'nome.usuario',
                        'option_d' => 'nome usuario',
                        'correct_option' => 'a',
                        'score' => 10,
                    ],
                    [
                        'topic' => 'Variáveis',
                        'question' => 'Como declarar uma variável do tipo string em PHP?',
                        'option_a' => '$nome = "João";',
                        'option_b' => '$nome := "João";',
                        'option_c' => 'let nome = "João";',
                        'option_d' => 'var nome = "João";',
                        'correct_option' => 'a',
                        'score' => 10,
                    ],
                    [
                        'topic' => 'Variáveis',
                        'question' => 'Qual destas opções NÃO é um tipo de variável em PHP?',
                        'option_a' => 'float',
                        'option_b' => 'string',
                        'option_c' => 'char',
                        'option_d' => 'array',
                        'correct_option' => 'c',
                        'score' => 10,
                    ],
                    [
                        'topic' => 'Variáveis',
                        'question' => 'Como concatenar duas variáveis em PHP?',
                        'option_a' => '$a . $b',
                        'option_b' => '$a + $b',
                        'option_c' => '$a , $b',
                        'option_d' => '$a & $b',
                        'correct_option' => 'a',
                        'score' => 10,
                    ],
                    [
                        'topic' => 'Variáveis',
                        'question' => 'Qual valor será exibido? <br> $a = 5; $b = &$a; $b = 10; echo $a;',
                        'option_a' => '10',
                        'option_b' => '5',
                        'option_c' => '0',
                        'option_d' => 'Erro',
                        'correct_option' => 'a',
                        'score' => 10,
                    ],
                    [
                        'topic' => 'Variáveis',
                        'question' => 'Como declarar uma variável global dentro de uma função?',
                        'option_a' => 'global $variavel;',
                        'option_b' => 'var $variavel;',
                        'option_c' => 'let $variavel;',
                        'option_d' => 'public $variavel;',
                        'correct_option' => 'a',
                        'score' => 10,
                    ],
                    [
                        'topic' => 'Variáveis',
                        'question' => 'Qual função retorna o tipo de uma variável em PHP?',
                        'option_a' => 'gettype()',
                        'option_b' => 'typeof()',
                        'option_c' => 'type()',
                        'option_d' => 'vartype()',
                        'correct_option' => 'a',
                        'score' => 10,
                    ],
                    [
                        'topic' => 'Variáveis',
                        'question' => 'Qual destas opções apaga uma variável em PHP?',
                        'option_a' => 'unset($variavel);',
                        'option_b' => 'delete $variavel;',
                        'option_c' => 'remove($variavel);',
                        'option_d' => 'destroy $variavel;',
                        'correct_option' => 'a',
                        'score' => 10,
                    ],

                    // Você pode manter as perguntas de outros tópicos normalmente
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
                    'score_obtained' => rand(70, 100), 
                    'completed_at' => now(),
                ]);
            }
        }
    }
}