<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Auth::user()->role === 'admin')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4">Admin Panel</h2>
                    <ul class="list-disc pl-5 space-y-2">
                        <li><a href="{{ route('admin.questions.index') }}" class="text-blue-600 underline">Manage Questions</a></li>
                        <li><a href="{{ route('admin.answers.index') }}" class="text-blue-600 underline">View All Answers</a></li>
                        <li><a href="{{ route('admin.sociogram') }}" class="text-blue-600 underline">View Sociogram</a></li>
                    </ul>
                </div>
            @else
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->name }}</h2>
                    <ul class="list-disc pl-5 space-y-2">
                        <li><a href="{{ route('student.questions') }}" class="text-blue-600 underline">Answer Questions</a></li>
                        <li><a href="{{ route('student.summary') }}" class="text-blue-600 underline">My Answer Summary</a></li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
