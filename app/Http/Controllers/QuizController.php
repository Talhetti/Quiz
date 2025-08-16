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

    public function show($quizId)
    {
        $quiz = \App\Models\Quiz::findOrFail($quizId);
        return view('quiz_show', compact('quiz'));
    }

    public function question($quizId)
    {
    $quiz = \App\Models\Quiz::findOrFail($quizId);
    return view('question', compact('quiz'));   
    }
    
}
