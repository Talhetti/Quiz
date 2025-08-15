<?php

namespace App\Http\Controllers;

use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('dashboard', compact('courses'));
    }
}
