<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\StudentAnswerController;

// For students to submit answers
Route::post('/answers', [StudentAnswerController::class, 'store'])->name('student.answers.store');
Route::post('/student/answers', [StudentAnswerController::class, 'store'])->name('student.answers.store');

Route::get('/student/answers', [StudentAnswerController::class, 'index'])->name('student.answers.index');

// Student Routes
Route::middleware('auth')->group(function () {
    // Student: Show questions
    Route::get('/questions', [StudentController::class, 'index'])->name('student.questions');

    // Student: Submit answers
    Route::post('/questions', [StudentController::class, 'store'])->name('student.questions.store');

    // Student: View their answers summary
    Route::get('/my-answers', [StudentController::class, 'summary'])->name('student.summary');
});

// Admin Routes


// Questions Management
// Admin routes for questions
// Admin routes for questions
Route::get('/admin/questions', [AdminController::class, 'index'])->name('questions.index');
Route::get('/admin/questions/create', [AdminController::class, 'createQuestion'])->name('questions.create');
Route::post('/admin/questions/store', [AdminController::class, 'storeQuestion'])->name('questions.store');
Route::get('/admin/questions/{question}/edit', [AdminController::class, 'editQuestion'])->name('questions.edit');
Route::post('/admin/questions/{question}/update', [AdminController::class, 'updateQuestion'])->name('questions.update');
Route::delete('/admin/questions/{question}', [AdminController::class, 'deleteQuestion'])->name('questions.delete');


Route::middleware('auth')->group(function () {
    // Admin: Manage questions
    Route::get('/admin/questions', [AdminController::class, 'index'])->name('admin.questions.index');
    Route::get('/admin/questions/create', [AdminController::class, 'create'])->name('admin.questions.create');
    Route::post('/admin/questions', [AdminController::class, 'store'])->name('admin.questions.store');
    Route::get('/admin/questions/{id}/edit', [AdminController::class, 'edit'])->name('admin.questions.edit');
    Route::post('/admin/questions/{id}', [AdminController::class, 'update'])->name('admin.questions.update');
    Route::delete('/admin/questions/{id}', [AdminController::class, 'destroy'])->name('admin.questions.destroy');

    // Admin: View all student answers
    Route::get('/admin/answers', [AdminController::class, 'answers'])->name('admin.answers.index');
       Route::get('/answer', [AdminController::class, 'answer'])->name('admin.answers');
    // Admin: View sociogram (interactive)
    Route::get('/admin/sociogram', [AdminController::class, 'sociogram'])->name('admin.sociogram');
});

// Auth routes (Login/Register from Laravel Breeze)
require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect()->route('register');
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
