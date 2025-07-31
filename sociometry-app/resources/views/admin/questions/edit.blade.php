@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Edit Pertanyaan</h2>

    <form method="POST" action="{{ route('questions.update', $question->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="text" class="block text-sm font-medium">Isi Pertanyaan</label>
            <textarea id="text" name="text" rows="4" class="w-full mt-1 border rounded p-2">{{ $question->text }}</textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
