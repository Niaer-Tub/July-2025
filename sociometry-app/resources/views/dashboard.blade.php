@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    @if (auth()->user()->role === 'admin')
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('questions.index') }}">📋 Manage Questions</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('questions.create') }}">➕ Create New Question</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('results.index') }}">📊 View Answers</a>
            </li>
        </ul>
    @else
        <p>Welcome, {{ auth()->user()->name }}!</p>
        <p>You can go to the sociometry form at <a href="{{ route('sociometry.create') }}">this link</a>.</p>
    @endif
</div>
@endsection
