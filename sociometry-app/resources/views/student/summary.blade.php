@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Ringkasan Jawaban Kamu</h2>
    @foreach ($answers as $answer)
        <div class="mb-4">
            <strong>{{ $answer->question->text }}</strong>
            <p>{{ implode(', ', json_decode($answer->selected_names, true)) }}</p>
        </div>
    @endforeach
</div>
@endsection
