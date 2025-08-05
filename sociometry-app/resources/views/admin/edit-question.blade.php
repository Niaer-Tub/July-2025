<x-app-layout>
    <x-slot name="header">Edit Question</x-slot>

    <div class="p-6">
        <form method="POST" action="/admin/questions/{{ $question->id }}/update">
            @csrf @method('PUT')
            <label class="block mb-2">Question Text</label>
            <textarea name="text" required class="w-full border p-2 rounded">{{ $question->text }}</textarea>
            <button class="mt-4 bg-blue-500 text-black px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
