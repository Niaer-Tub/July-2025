<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Manajemen Pertanyaan</h2>
    </x-slot>

    <div class="py-8 max-w-5xl mx-auto">
        <a href="{{ route('admin.questions.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Pertanyaan</a>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="bg-white p-4 rounded shadow">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left">#</th>
                        <th class="px-4 py-2 text-left">Pertanyaan</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questions as $q)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $q->text }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('admin.questions.edit', $q->id) }}" class="text-blue-600">Edit</a> |
                                <form action="{{ route('admin.questions.destroy', $q->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600" onclick="return confirm('Hapus pertanyaan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
    