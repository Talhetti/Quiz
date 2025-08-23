<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Settings;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('auth.login');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('settings/profile', [Settings\ProfileController::class, 'edit'])->name('settings.profile.edit');
    Route::put('settings/profile', [Settings\ProfileController::class, 'update'])->name('settings.profile.update');
    Route::delete('settings/profile', [Settings\ProfileController::class, 'destroy'])->name('settings.profile.destroy');
    Route::get('settings/password', [Settings\PasswordController::class, 'edit'])->name('settings.password.edit');
    Route::put('settings/password', [Settings\PasswordController::class, 'update'])->name('settings.password.update');
    Route::get('settings/appearance', [Settings\AppearanceController::class, 'edit'])->name('settings.appearance.edit');
    Route::get('histories', [HistoryController::class, 'index'])->name('histories.index');
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['verified'])->name('dashboard');
    Route::get('courses/{course}', [QuizController::class, 'index'])->name('courses.quizzes');
    Route::get('quizzes/{quiz}/question', [QuizController::class, 'question'])->name('quizzes.question');
    Route::post('quizzes/{quiz}/answer', [QuizController::class, 'answer'])->name('quizzes.answer');
});

require __DIR__.'/auth.php';