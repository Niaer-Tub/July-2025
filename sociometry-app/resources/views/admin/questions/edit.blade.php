<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Edit Pertanyaan</h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto">
        <form action="{{ route('admin.questions.update', $question->id) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block font-bold mb-2">Isi Pertanyaan</label>
                <textarea name="text" rows="4" class="w-full border px-4 py-2 rounded" required>{{ $question->text }}</textarea>
            </div>
            <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
