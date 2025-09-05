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
    public function index($courseId)
    {
        $course = Course::findOrFail($courseId);
        $quizzes = Quiz::where('course_id', $courseId)->get();

        return view('quiz', compact('course', 'quizzes'));
    }

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
        // Salva os IDs das perguntas na sessão para feedback detalhado
        if (!$request->session()->has('quiz.questions')) {
            $request->session()->put('quiz.questions', $questions->pluck('id')->toArray());
        }

        $current = $request->session()->get('current_question', 0);
        $score = $request->session()->get('score', 0);

        if ($current >= $questions->count()) {
            // NÃO limpe as sessões aqui! (deixe para o feedback)
            // Salva histórico do usuário por quiz, linguagem e tópico
            $userId = Auth::id();
            $quizId = $quiz->id;
            $scoreObtained = $score * ($quiz->score ?? 1);

            History::where('user_id', $userId)
                ->where('quiz_id', $quizId)
                ->where('course_id', $quiz->course_id)
                ->delete();

            History::create([
                'user_id' => $userId,
                'quiz_id' => $quizId,
                'course_id' => $quiz->course_id,
                'topic' => $quiz->topic,
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

    public function answer($topic, Request $request)
    {
        $quiz = Quiz::where('topic', $topic)->firstOrFail();
        $questions = Question::where('quiz_id', $quiz->id)->get();
        $current = $request->session()->get('current_question', 0);
        $score = $request->session()->get('score', 0);

        $question = $questions[$current];

        // Salva a resposta do usuário na sessão para feedback detalhado
        $answers = $request->session()->get('quiz.answers', []);
        $answers[$question->id] = $request->input('answer');
        $request->session()->put('quiz.answers', $answers);

        if ($request->input('answer') === $question->correct_option) {
            $score++;
        }

        $request->session()->put('current_question', $current + 1);
        $request->session()->put('score', $score);

        return redirect()->route('quizzes.question', $quiz->topic);
    }

    public function feedback($topic, Request $request)
    {
        $quiz = Quiz::where('topic', $topic)->firstOrFail();
        $questions = $request->session()->get('quiz.questions', []);
        $answers = $request->session()->get('quiz.answers', []);
        $questionsData = [];

        foreach ($questions as $questionId) {
            $question = Question::find($questionId);
            if ($question) {
                $userAnswer = $answers[$questionId] ?? null;
                $isCorrect = $userAnswer === $question->correct_option;
                $questionsData[] = [
                    'question' => $question,
                    'user_answer' => $userAnswer,
                    'is_correct' => $isCorrect,
                ];
            }
        }

        $request->session()->forget(['current_question', 'score', 'quiz.questions', 'quiz.answers']);

        return view('quiz_feedback_detail', [
            'questionsData' => $questionsData,
            'quiz' => $quiz,
        ]);
    }
}