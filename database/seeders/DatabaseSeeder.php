<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Question;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Usuário Teste',
            'email' => 'teste@example.com',
            'password' => bcrypt('senha123'),
        ]);

        $coursesData = [
            [
                'name_course' => 'PHP',
                'description' => 'Curso de PHP',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg',
                'topics' => [
                    'Variáveis',
                    'Funções',
                    'Arrays',
                    'Strings',
                    'Condicionais',
                ],
            ],
            [
                'name_course' => 'JavaScript',
                'description' => 'Curso de JavaScript',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png',
                'topics' => [
                    'Arrays',
                    'DOM',
                    'Funções',
                    'Eventos',
                    'Objetos',
                ],
            ],
            // Adicione mais cursos conforme desejar
        ];

        foreach ($coursesData as $courseData) {
            $course = Course::create([
                'name_course' => $courseData['name_course'],
                'description' => $courseData['description'],
                'quiz_count' => count($courseData['topics']),
                'user_id' => $user->id,
                'image_url' => $courseData['image_url'],
            ]);

            foreach ($courseData['topics'] as $topic) {
                $quiz = Quiz::create([
                    'course_id' => $course->id,
                    'topic' => $topic,
                    'score' => 10,
                ]);

                // Perguntas reais para cada tópico do curso PHP
                if ($course->name_course === 'PHP') {
                    if ($topic === 'Variáveis') {
                        $realQuestions = [
                            [
                                'question' => 'Como declarar uma variável em PHP?',
                                'option_a' => '$variavel = 10;',
                                'option_b' => 'var variavel = 10;',
                                'option_c' => 'let variavel = 10;',
                                'option_d' => 'variavel := 10;',
                                'correct_option' => 'a',
                            ],
                            [
                                'question' => 'Qual símbolo inicia uma variável em PHP?',
                                'option_a' => '#',
                                'option_b' => '$',
                                'option_c' => '@',
                                'option_d' => '&',
                                'correct_option' => 'b',
                            ],
                            [
                                'question' => 'Qual destas é uma variável válida em PHP?',
                                'option_a' => '$1var',
                                'option_b' => '$var_1',
                                'option_c' => 'var$1',
                                'option_d' => '1$var',
                                'correct_option' => 'b',
                            ],
                            [
                                'question' => 'Como concatenar variáveis em PHP?',
                                'option_a' => 'Usando +',
                                'option_b' => 'Usando .',
                                'option_c' => 'Usando &',
                                'option_d' => 'Usando ,',
                                'correct_option' => 'b',
                            ],
                            [
                                'question' => 'Qual destas opções atribui o valor 5 à variável $x?',
                                'option_a' => '$x = 5;',
                                'option_b' => 'x := 5;',
                                'option_c' => 'let $x = 5;',
                                'option_d' => 'var x = 5;',
                                'correct_option' => 'a',
                            ],
                        ];
                        foreach ($realQuestions as $q) {
                            Question::create(array_merge($q, [
                                'quiz_id' => $quiz->id,
                            ]));
                        }
                    } elseif ($topic === 'Funções') {
                        $funcoesQuestions = [
                            [
                                'question' => 'Como se declara uma função em PHP?',
                                'option_a' => 'function minhaFuncao() {}',
                                'option_b' => 'def minhaFuncao() {}',
                                'option_c' => 'fun minhaFuncao() {}',
                                'option_d' => 'minhaFuncao := function() {}',
                                'correct_option' => 'a',
                            ],
                            [
                                'question' => 'Como se chama uma função chamada soma?',
                                'option_a' => 'call soma();',
                                'option_b' => 'soma();',
                                'option_c' => 'invoke soma();',
                                'option_d' => 'run soma();',
                                'correct_option' => 'b',
                            ],
                            [
                                'question' => 'Qual palavra-chave retorna um valor de uma função?',
                                'option_a' => 'break',
                                'option_b' => 'return',
                                'option_c' => 'yield',
                                'option_d' => 'output',
                                'correct_option' => 'b',
                            ],
                            [
                                'question' => 'Como passar um parâmetro para uma função?',
                                'option_a' => 'function soma($a) {}',
                                'option_b' => 'function soma(a) {}',
                                'option_c' => 'function soma[a] {}',
                                'option_d' => 'function soma{$a} {}',
                                'correct_option' => 'a',
                            ],
                            [
                                'question' => 'Como definir um valor padrão para um parâmetro?',
                                'option_a' => 'function soma($a = 0) {}',
                                'option_b' => 'function soma($a == 0) {}',
                                'option_c' => 'function soma($a := 0) {}',
                                'option_d' => 'function soma($a default 0) {}',
                                'correct_option' => 'a',
                            ],
                        ];
                        foreach ($funcoesQuestions as $q) {
                            Question::create(array_merge($q, [
                                'quiz_id' => $quiz->id,
                            ]));
                        }
                    } elseif ($topic === 'Arrays') {
                        $arraysQuestions = [
                            [
                                'question' => 'Como se cria um array em PHP?',
                                'option_a' => '$arr = array(1, 2, 3);',
                                'option_b' => '$arr = [1, 2, 3];',
                                'option_c' => '$arr = {1, 2, 3};',
                                'option_d' => '$arr = <1, 2, 3>;',
                                'correct_option' => 'a',
                            ],
                            [
                                'question' => 'Como acessar o segundo elemento de um array?',
                                'option_a' => '$arr[2]',
                                'option_b' => '$arr[1]',
                                'option_c' => '$arr(2)',
                                'option_d' => '$arr{2}',
                                'correct_option' => 'b',
                            ],
                            [
                                'question' => 'Como adicionar um elemento ao final de um array?',
                                'option_a' => 'array_push($arr, 4);',
                                'option_b' => '$arr[] = 4;',
                                'option_c' => 'push($arr, 4);',
                                'option_d' => 'add($arr, 4);',
                                'correct_option' => 'a',
                            ],
                            [
                                'question' => 'Como contar elementos de um array?',
                                'option_a' => 'count($arr);',
                                'option_b' => 'size($arr);',
                                'option_c' => 'length($arr);',
                                'option_d' => 'num($arr);',
                                'correct_option' => 'a',
                            ],
                            [
                                'question' => 'Como remover o último elemento de um array?',
                                'option_a' => 'array_pop($arr);',
                                'option_b' => 'pop($arr);',
                                'option_c' => 'remove($arr);',
                                'option_d' => 'delete($arr);',
                                'correct_option' => 'a',
                            ],
                        ];
                        foreach ($arraysQuestions as $q) {
                            Question::create(array_merge($q, [
                                'quiz_id' => $quiz->id,
                            ]));
                        }
                    } elseif ($topic === 'Strings') {
                        $stringsQuestions = [
                            [
                                'question' => 'Como concatenar duas strings em PHP?',
                                'option_a' => '$a . $b',
                                'option_b' => '$a + $b',
                                'option_c' => 'concat($a, $b)',
                                'option_d' => '$a & $b',
                                'correct_option' => 'a',
                            ],
                            [
                                'question' => 'Como obter o tamanho de uma string?',
                                'option_a' => 'strlen($str)',
                                'option_b' => 'length($str)',
                                'option_c' => 'size($str)',
                                'option_d' => 'count($str)',
                                'correct_option' => 'a',
                            ],
                            [
                                'question' => 'Como transformar uma string em maiúsculas?',
                                'option_a' => 'strtoupper($str)',
                                'option_b' => 'toUpper($str)',
                                'option_c' => 'upper($str)',
                                'option_d' => 'strupper($str)',
                                'correct_option' => 'a',
                            ],
                            [
                                'question' => 'Como substituir parte de uma string?',
                                'option_a' => 'str_replace("a", "b", $str)',
                                'option_b' => 'replace($str, "a", "b")',
                                'option_c' => 'strchange($str, "a", "b")',
                                'option_d' => 'change("a", "b", $str)',
                                'correct_option' => 'a',
                            ],
                            [
                                'question' => 'Como remover espaços do início e fim de uma string?',
                                'option_a' => 'trim($str)',
                                'option_b' => 'strip($str)',
                                'option_c' => 'clean($str)',
                                'option_d' => 'removeSpaces($str)',
                                'correct_option' => 'a',
                            ],
                        ];
                        foreach ($stringsQuestions as $q) {
                            Question::create(array_merge($q, [
                                'quiz_id' => $quiz->id,
                            ]));
                        }
                    } elseif ($topic === 'Condicionais') {
                        $condicionaisQuestions = [
                            [
                                'question' => 'Como se faz uma estrutura condicional em PHP?',
                                'option_a' => 'if ($a > $b) { ... }',
                                'option_b' => 'if $a > $b then { ... }',
                                'option_c' => 'if ($a > $b): ... endif;',
                                'option_d' => 'if $a > $b { ... }',
                                'correct_option' => 'a',
                            ],
                            [
                                'question' => 'Qual operador representa “igual” em PHP?',
                                'option_a' => '=',
                                'option_b' => '==',
                                'option_c' => '===',
                                'option_d' => '!=',
                                'correct_option' => 'b',
                            ],
                            [
                                'question' => 'Como fazer um “else” em PHP?',
                                'option_a' => 'else { ... }',
                                'option_b' => 'otherwise { ... }',
                                'option_c' => 'elseif { ... }',
                                'option_d' => 'ifnot { ... }',
                                'correct_option' => 'a',
                            ],
                            [
                                'question' => 'Como comparar valor e tipo?',
                                'option_a' => '==',
                                'option_b' => '=',
                                'option_c' => '===',
                                'option_d' => '!=',
                                'correct_option' => 'c',
                            ],
                            [
                                'question' => 'Como negar uma condição?',
                                'option_a' => '!$a',
                                'option_b' => 'not $a',
                                'option_c' => '~$a',
                                'option_d' => '-$a',
                                'correct_option' => 'a',
                            ],
                        ];
                        foreach ($condicionaisQuestions as $q) {
                            Question::create(array_merge($q, [
                                'quiz_id' => $quiz->id,
                            ]));
                        }
                    }
                } else {
                    // Cria 5 perguntas genéricas para outros tópicos
                    for ($i = 1; $i <= 5; $i++) {
                        Question::create([
                            'quiz_id' => $quiz->id,
                            'question' => "Pergunta $i sobre $topic em {$course->name_course}?",
                            'option_a' => "Opção A $i",
                            'option_b' => "Opção B $i",
                            'option_c' => "Opção C $i",
                            'option_d' => "Opção D $i",
                            'correct_option' => 'a',
                        ]);
                    }
                }
            }
        }
    }
}