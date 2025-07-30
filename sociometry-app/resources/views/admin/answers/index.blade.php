<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Semua Jawaban Siswa</h2>
    </x-slot>

    <div class="py-8 max-w-6xl mx-auto space-y-4">
        @foreach($answers as $answer)
            <div class="bg-white p-4 rounded shadow">
                <p class="mb-1 font-bold">Siswa: {{ $answer->user->name }}</p>
                <p class="mb-1">Pertanyaan: {{ $answer->question->text }}</p>
                <p class="mb-1">Pilihan Teman:
                    @foreach($answer->selectedFriends as $friend)
                        <span class="inline-block bg-gray-200 rounded px-2 py-1 mr-1">{{ $friend->name }}</span>
                    @endforeach
                </p>
            </div>
        @endforeach
    </div>
</x-app-layout>
