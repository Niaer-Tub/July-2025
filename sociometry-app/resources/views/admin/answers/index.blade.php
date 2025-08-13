<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">📋 Semua Jawaban Siswa</h2>
    </x-slot>

    <div class="py-8 max-w-6xl mx-auto space-y-6">
        @forelse($answers as $answer)
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition duration-200">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                    <div class="mb-3 md:mb-0">
                        <p class="text-lg font-semibold text-gray-900">
                            👤 Siswa:
                            <span class="text-blue-600">{{ $answer->user->name }}</span>
                        </p>
                        <p class="text-gray-600 mt-1">
                            ❓ Pertanyaan:
                            <span class="font-medium">{{ $answer->question->text }}</span>
                        </p>
                    </div>
                    <div class="bg-blue-50 px-4 py-2 rounded-lg text-sm font-medium text-blue-800">
                        #{{ $loop->iteration }}
                    </div>
                </div>

                <div class="mt-4">
                    <p class="text-gray-700 font-medium mb-2">👥 Pilihan Teman:</p>
                    @php
                        $friends = json_decode($answer->selected_names, true) ?? [];
                    @endphp
                    <div class="flex flex-wrap gap-2">
                        @forelse($friends as $friendName)
                            <span class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm shadow-sm">
                                {{ $friendName }}
                            </span>
                        @empty
                            <span class="text-gray-500 italic">Tidak memilih teman</span>
                        @endforelse
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500 italic">Belum ada jawaban dari siswa.</div>
        @endforelse
    </div>
</x-app-layout>
