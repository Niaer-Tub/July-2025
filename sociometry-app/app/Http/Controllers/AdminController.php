<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use App\Models\Answer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $questions = Question::all();
        return view('admin.dashboard', compact('questions'));
    }
    public function index()
{
    $questions = Question::all();
    return view('admin.questions.index', compact('questions'));
}

public function answers()
{
    $answers = \App\Models\Answer::with(['user', 'question'])->get();

    return view('admin.answers.index', compact('answers'));
}



public function sociogram()
{
    $students = User::where('role', 'student')->with('answers')->get();

    $links = [];
    foreach ($students as $student) {
        foreach ($student->answers as $answer) {
            $selectedNames = json_decode($answer->selected_names, true);
            foreach ($selectedNames as $targetName) {
                $target = User::where('name', $targetName)->first();
                if ($target) {
                    $links[] = [
                        'source' => $student->id,
                        'target' => $target->id,
                    ];
                }
            }
        }
    }

    return view('admin.sociogram', compact('students', 'links'));
}

    public function createQuestion()
    {
        return view('admin.create-question');
    }

    public function storeQuestion(Request $request)
    {
        $request->validate(['text' => 'required|string']);
        Question::create(['text' => $request->text]);
        return redirect('/admin')->with('success', 'Question added');
    }

    public function editQuestion(Question $question)
    {
        return view('admin.edit-question', compact('question'));
    }

    public function updateQuestion(Request $request, Question $question)
    {
        $request->validate(['text' => 'required|string']);
        $question->update(['text' => $request->text]);
        return redirect('/admin')->with('success', 'Question updated');
    }

    public function deleteQuestion(Question $question)
    {
        $question->delete();
        return redirect('/admin')->with('success', 'Question deleted');
    }

    public function viewAnswers()
    {
        $answers = Answer::with('user', 'question', 'selectedFriends')->get();
        return view('admin.answers', compact('answers'));
    }


}
