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

        // Delete old answers from this student for the question
        Answer::where('user_id', $user->id)
            ->where('question_id', $request->question_id)
            ->delete();

        // Store new answers
        foreach ($request->selected_students as $friend_id) {
            Answer::create([
                'user_id' => $user->id,
                'question_id' => $request->question_id,
                'friend_id' => $friend_id,
            ]);
        }

        return redirect()->back()->with('success', 'Jawaban berhasil disimpan.');
    }
}
