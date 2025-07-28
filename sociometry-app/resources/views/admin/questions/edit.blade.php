@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">✏️ Edit Pertanyaan</h2>

    <form method="POST" action="{{ route('questions.update', $question) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="text" class="form-label">Pertanyaan</label>
            <textarea class="form-control @error('text') is-invalid @enderror" name="text" rows="4" required>{{ old('text', $question->text) }}</textarea>
            @error('text')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">💾 Simpan Perubahan</button>
        <a href="{{ route('questions.index') }}" class="btn btn-secondary ms-2">Kembali</a>
    </form>
</div>
@endsection
