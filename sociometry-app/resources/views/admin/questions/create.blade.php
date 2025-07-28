@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 750px;">
    <div class="card shadow-sm border-0 rounded-4 p-4">
        <h2 class="mb-4 text-center text-primary fw-bold">Edit Pertanyaan</h2>

        <form method="POST" action="{{ route('questions.update', $question) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="text" class="form-label">Pertanyaan</label>
                <textarea name="text" class="form-control @error('text') is-invalid @enderror" rows="4" placeholder="Masukkan pertanyaan..." required>{{ old('text', $question->text) }}</textarea>
                @error('text')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-3">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary px-4 py-2 rounded-3">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
