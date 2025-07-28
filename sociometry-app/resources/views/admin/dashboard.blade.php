@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">🎓 Admin Dashboard</h2>
        <p class="text-muted">Kelola pertanyaan dan lihat hasil sosiometri siswa</p>
    </div>

    <div class="row justify-content-center g-4">
        <div class="col-md-6">
            <a href="{{ route('questions.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm p-4 h-100 text-center">
                    <h4 class="mb-2">📋 Pertanyaan</h4>
                    <p class="text-muted">Tambah dan kelola pertanyaan sosiometri</p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('results.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm p-4 h-100 text-center">
                    <h4 class="mb-2">📊 Hasil Sosiometri</h4>
                    <p class="text-muted">Lihat sosiogram dan jawaban siswa</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
