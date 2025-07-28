<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()?->role !== 'admin') {
            return redirect('/');
        }

        return view('admin.dashboard');
    }

    public function questions()
    {
        if (Auth::user()?->role !== 'admin') {
            return redirect('/');
        }

        $questions = Question::all();
        return view('admin.questions.index', compact('questions'));
    }

    public function createQuestion()
    {
        if (Auth::user()?->role !== 'admin') {
            return redirect('/');
        }

        return view('admin.questions.create');
    }

    public function storeQuestion(Request $request)
    {
        if (Auth::user()?->role !== 'admin') {
            return redirect('/');
        }

        $request->validate([
            'text' => 'required'
        ]);

        Question::create([
            'text' => $request->text
        ]);

        return redirect('/admin/questions');
    }

    public function viewAnswers()
{
    if (Auth::user()?->role !== 'admin') {
        return redirect('/');
    }

    $answers = Answer::with(['student', 'question'])->get();
    $students = Student::all();

    // Prepare nodes and edges for sociogram
    $nodes = [];
    $edges = [];

    foreach ($students as $student) {
        $nodes[] = ['id' => $student->name, 'label' => $student->name];
    }

    foreach ($answers as $answer) {
        $from = $answer->student->name;
    $toArray = $answer->selected_students;


        foreach ($toArray as $to) {
            $edges[] = ['from' => $from, 'to' => $to];
        }
    }

    return view('admin.answers.index', compact('answers', 'students', 'nodes', 'edges'));
}

}

