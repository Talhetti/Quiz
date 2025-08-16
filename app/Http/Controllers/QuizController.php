<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index($courseId)
    {
        $course = \App\Models\Course::findOrFail($courseId);
        $quizzes = \App\Models\Quiz::where('course_id', $courseId)->get();

        return view('quiz', compact('course', 'quizzes'));
    }

    // Inicia o quiz, sorteando 10 perguntas e salvando na sessão
    public function start($courseId)
    {
        $questions = \App\Models\Quiz::where('course_id', $courseId)->inRandomOrder()->limit(10)->pluck('id')->toArray();
        session([
            'quiz.questions' => $questions,
            'quiz.current' => 0,
            'quiz.correct' => 0,
            'quiz.answers' => [],
        ]);
        return redirect()->route('quizzes.question', $courseId);
    }

    // Exibe a pergunta atual
    public function question($courseId)
    {
        $questions = session('quiz.questions');
        $current = session('quiz.current', 0);

        if (!$questions || $current >= count($questions)) {
            return redirect()->route('quizzes.result', $courseId);
        }

        $quiz = \App\Models\Quiz::findOrFail($questions[$current]);
        $feedback = session('quiz.feedback', null);
        session()->forget('quiz.feedback');

        return view('question', compact('quiz', 'current', 'feedback'));
    }

    // Processa a resposta e mostra feedback imediato
    public function answer(Request $request, $courseId)
    {
        $questions = session('quiz.questions');
        $current = session('quiz.current', 0);

        if (!$questions || $current >= count($questions)) {
            return redirect()->route('quizzes.result', $courseId);
        }

        $quiz = \App\Models\Quiz::findOrFail($questions[$current]);
        $selected = $request->input('answer');
        $isCorrect = $selected === $quiz->correct_option;

        // Salva feedback para a próxima view
        session(['quiz.feedback' => [
            'selected' => $selected,
            'isCorrect' => $isCorrect,
            'correct_option' => $quiz->correct_option,
        ]]);

        // Atualiza acertos e respostas
        $answers = session('quiz.answers', []);
        $answers[$quiz->id] = $selected;
        session(['quiz.answers' => $answers]);
        if ($isCorrect) {
            session(['quiz.correct' => session('quiz.correct') + 1]);
        }

        // Avança para próxima pergunta
        session(['quiz.current' => $current + 1]);

        return redirect()->route('quizzes.question', $courseId);
    }

    // Mostra o resultado final
    public function result($courseId)
    {
        $correct = session('quiz.correct', 0);
        $total = count(session('quiz.questions', []));
        session()->forget(['quiz.questions', 'quiz.current', 'quiz.correct', 'quiz.answers']);
        return view('quiz_result', compact('correct', 'total'));
    }
}