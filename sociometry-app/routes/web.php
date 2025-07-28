<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionController;

Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/questions', [AdminController::class, 'questions'])->name('questions.index');
Route::get('/admin/questions/create', [AdminController::class, 'createQuestion'])->name('questions.create');
Route::post('/admin/questions', [AdminController::class, 'storeQuestion'])->name('questions.store');
Route::get('/admin/answers', [AdminController::class, 'viewAnswers'])->name('answers.index');
Route::get('/admin/answers', [AdminController::class, 'viewAnswers'])->name('results.index');
Route::resource('questions', QuestionController::class);


Route::get('/sociometry', [StudentController::class, 'enterName']);
Route::post('/sociometry/start', [StudentController::class, 'start']);
Route::get('/sociometry/{student}/questions', [StudentController::class, 'showQuestions']);
Route::post('/sociometry/{student}/submit', [StudentController::class, 'submitAnswers']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
