<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{

public function edit(Question $question)
{
    return view('admin.questions.edit', compact('question'));
}

public function update(Request $request, Question $question)
{
    $request->validate([
        'text' => 'required|string|max:1000'
    ]);

    $question->update([
        'text' => $request->text
    ]);

    return redirect()->route('questions.index')->with('success', 'Pertanyaan berhasil diperbarui.');
}

public function destroy(Question $question)
{
    $question->delete();
    return redirect()->route('questions.index')->with('success', 'Pertanyaan berhasil dihapus.');
}

}
