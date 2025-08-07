<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
public function index()
{
    $questions = Question::all();
    $students = User::where('role', 'student')->get();

    return view('student.questions', compact('questions', 'students'));
}


    public function store(Request $request)
{
    $user = Auth::user(); // Get the logged-in student

    foreach ($request->answers as $questionId => $names) {
        Answer::create([
            'user_id' => $user->id,
            'question_id' => $questionId,
            'selected_names' => json_encode($names),
        ]);
    }

    return redirect()->route('student.answers.index')->with('success', 'Jawaban berhasil dikirim!');
}

    public function summary()
    {
        $answers = Answer::where('user_id', Auth::id())->with('question', 'selectedFriends')->get();

        return view('student.summary', compact('answers'));
    }
}
