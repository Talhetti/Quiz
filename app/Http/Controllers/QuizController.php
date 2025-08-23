<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Course;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Exibe os tópicos (quizzes) de um curso.
     */
    public function index($courseId)
    {
        $course = Course::findOrFail($courseId);
        $quizzes = Quiz::where('course_id', $courseId)->get();

        return view('quiz', compact('course', 'quizzes'));
    }

    /**
     * Exibe uma pergunta por vez do quiz/tópico.
     * Inicializa a sessão ao acessar o quiz.
     */
    public function question($topic, Request $request)
    {
        $quiz = Quiz::where('topic', $topic)->firstOrFail();
        $questions = Question::where('quiz_id', $quiz->id)->get();

        // Inicializa sessão se não existir
        if (!$request->session()->has('current_question')) {
            $request->session()->put('current_question', 0);
        }
        if (!$request->session()->has('score')) {
            $request->session()->put('score', 0);
        }

        $current = $request->session()->get('current_question', 0);
        $score = $request->session()->get('score', 0);

        if ($current >= $questions->count()) {
            $request->session()->forget(['current_question', 'score']);

            // Salva histórico do usuário por quiz, linguagem e tópico
            $userId = Auth::id();
            $quizId = $quiz->id;
            $scoreObtained = $score * $quiz->score;

            History::where('user_id', $userId)
                ->where('quiz_id', $quizId)
                ->where('course_id', $quiz->course_id)
                ->delete();

            History::create([
                'user_id' => $userId,
                'quiz_id' => $quizId,
                'course_id' => $quiz->course_id, // linguagem
                'topic' => $quiz->topic,         // tópico
                'score_obtained' => $scoreObtained,
                'completed_at' => now(),
            ]);

            return view('quiz_feedback', [
                'score' => $score,
                'total' => $questions->count(),
                'quiz' => $quiz,
            ]);
        }

        $question = $questions[$current];

        return view('question', compact('quiz', 'question', 'current', 'score'));
    }

    /**
     * Processa a resposta do usuário e avança para a próxima pergunta.
     */
    public function answer($topic, Request $request)
    {
        $quiz = Quiz::where('topic', $topic)->firstOrFail();
        $questions = Question::where('quiz_id', $quiz->id)->get();
        $current = $request->session()->get('current_question', 0);
        $score = $request->session()->get('score', 0);

        $question = $questions[$current];
        if ($request->input('answer') === $question->correct_option) {
            $score++;
        }

        $request->session()->put('current_question', $current + 1);
        $request->session()->put('score', $score);

        return redirect()->route('quizzes.question', $quiz->topic);
    }
}