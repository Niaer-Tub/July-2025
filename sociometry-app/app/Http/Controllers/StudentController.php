<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Question;
use App\Models\Answer;

class StudentController extends Controller
{
    public function enterName()
    {
        return view('student.enter-name');
    }

    public function start(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $student = Student::create([
            'name' => $request->name
        ]);

        return redirect("/sociometry/{$student->id}/questions");
    }

    public function showQuestions(Student $student)
    {
        $questions = Question::all();
        $students = Student::where('id', '!=', $student->id)->get(); // exclude self

        return view('student.answer-questions', compact('student', 'questions', 'students'));
    }

    public function submitAnswers(Request $request, Student $student)
    {
        foreach ($request->answers as $questionId => $selectedStudents) {
            Answer::create([
                'student_id' => $student->id,
                'question_id' => $questionId,
                'selected_students' => json_encode($selectedStudents)
            ]);
        }

        return view('student.thank-you');
    }
}
