<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin Dashboard - Questions</h2>
    </x-slot>

    <div class="py-6 px-6">
        <a href="/admin/questions/create" class="bg-blue-500 text-white px-4 py-2 rounded">+ Add Question</a>

        <ul class="mt-4">
            @foreach($questions as $q)
                <li class="border-b py-2">
                    {{ $q->text }}
                    <a href="/admin/questions/{{ $q->id }}/edit" class="text-blue-600 ml-2">Edit</a>
                    <form method="POST" action="/admin/questions/{{ $q->id }}/delete" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600 ml-2" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <div class="mt-6 space-x-4">
            <a href="/admin/answers" class="bg-green-500 text-white px-4 py-2 rounded">View Answers</a>
            <a href="/admin/sociogram" class="bg-purple-500 text-white px-4 py-2 rounded">View Sociogram</a>
        </div>
    </div>
</x-app-layout>
