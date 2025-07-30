<x-app-layout>
    <x-slot name="header">Add Question</x-slot>

    <div class="p-6">
        <form method="POST" action="/admin/questions/store">
            @csrf
            <label class="block mb-2">Question Text</label>
            <textarea name="text" required class="w-full border p-2 rounded">{{ old('text') }}</textarea>
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</x-app-layout>
