<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Question;


class StudentAnswerController extends Controller
{




public function index()
{
    $questions = Question::all();
    $students = User::where('role', 'student')->get();

    return view('student.answers.index', [
        'questions' => $questions,
        'students' => $students
    ]);
}
public function store(Request $request)
{
    $request->validate([
        'question_id' => 'required|exists:questions,id',
        'selected_students' => 'required|array|min:1|max:5',
        'selected_students.*' => 'exists:users,id',
    ]);

    $user = Auth::user();

    // Get the names of selected friends
    $selectedNames = User::whereIn('id', $request->selected_students)
                         ->pluck('name')
                         ->toArray();

    // Save or update in one row
    Answer::updateOrCreate(
        [
            'user_id' => $user->id,
            'question_id' => $request->question_id
        ],
        [
            'selected_names' => json_encode($selectedNames)
        ]
    );

    return redirect()->back()->with('success', 'Jawaban berhasil disimpan.');
}
}
