@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📋 Daftar Pertanyaan</h2>
        <a href="{{ route('questions.create') }}" class="btn btn-primary">+ Tambah Pertanyaan</a>
    </div>

    @if($questions->isEmpty())
        <div class="alert alert-warning">Belum ada pertanyaan.</div>
    @else
        <div class="list-group shadow-sm">
            @foreach($questions as $question)
                <div class="list-group-item d-flex justify-content-between align-items-start">
                    <div style="max-width: 80%;">
                        {{ $question->text }}
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('questions.edit', $question) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('questions.destroy', $question) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pertanyaan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
