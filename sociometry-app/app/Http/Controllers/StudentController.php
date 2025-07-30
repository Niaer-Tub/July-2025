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
        $users = User::where('role', 'student')->where('id', '!=', Auth::id())->get();

        return view('student.questions', compact('questions', 'users'));
    }

    public function store(Request $request)
    {
        $studentId = Auth::id();

        foreach ($request->answers as $questionId => $friendIds) {
            $answer = Answer::updateOrCreate(
                ['question_id' => $questionId, 'user_id' => $studentId]
            );

            $answer->selectedFriends()->sync($friendIds);
        }

        return redirect()->route('student.summary')->with('success', 'Jawaban disimpan.');
    }

    public function summary()
    {
        $answers = Answer::where('user_id', Auth::id())->with('question', 'selectedFriends')->get();

        return view('student.summary', compact('answers'));
    }
}
