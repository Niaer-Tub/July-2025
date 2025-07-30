<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Tambah Pertanyaan</h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto">
        <form action="{{ route('admin.questions.store') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            <div class="mb-4">
                <label class="block font-bold mb-2">Isi Pertanyaan</label>
                <textarea name="text" rows="4" class="w-full border px-4 py-2 rounded" required></textarea>
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>
