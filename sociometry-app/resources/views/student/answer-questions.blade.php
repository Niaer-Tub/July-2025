@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Halo, {{ $student->name }}! Jawab pertanyaan berikut:</h2>
    <form action="/sociometry/{{ $student->id }}/submit" method="POST">
        @csrf

        @foreach ($questions as $question)
            <div class="mb-4">
                <label><strong>{{ $question->text }}</strong></label><br>
                <select name="answers[{{ $question->id }}][]" class="form-control" multiple required size="5">
                    @foreach ($students as $s)
                        <option value="{{ $s->name }}">{{ $s->name }}</option>
                    @endforeach
                </select>
                <small>Pilih 1-5 teman</small>
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Kirim Jawaban</button>
    </form>
</div>
@endsection
