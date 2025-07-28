@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Masukkan Nama Kamu</h2>
    <form action="/sociometry/start" method="POST">
        @csrf
        <input type="text" name="name" class="form-control" placeholder="Nama lengkap" required>
        <button type="submit" class="btn btn-primary mt-2">Mulai</button>
    </form>
</div>
@endsection
