<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Halo, {{ Auth::user()->name }}! Isi Kuesioner Sosiometri
        </h2>
    </x-slot>

    <div class="py-6 px-6">
        <form method="POST" action="/student/submit">
            @csrf

            @foreach($questions as $question)
                <div class="border p-4 mb-4 rounded shadow">
                    <h3 class="font-semibold mb-2">{{ $loop->iteration }}. {{ $question->text }}</h3>

                    <div class="grid grid-cols-2 gap-2">
                        @foreach($users as $friend)
                            <label class="flex items-center space-x-2">
                                <input
                                    type="checkbox"
                                    name="answers[{{ $question->id }}][]"
                                    value="{{ $friend->id }}"
                                    @if(isset($existingAnswers[$question->id]) && $existingAnswers[$question->id]->selectedFriends->contains($friend->id)) checked @endif
                                    class="accent-blue-500"
                                >
                                <span>{{ $friend->name }}</span>
                            </label>
                        @endforeach
                    </div>

                    <small class="text-gray-500 block mt-1">Pilih 1 sampai 5 teman</small>
                </div>
            @endforeach

            <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Simpan Jawaban</button>
        </form>
    </div>

    <script>
        // Prevent selecting more than 5 friends per question
        document.querySelectorAll('div.border').forEach(section => {
            section.addEventListener('change', function () {
                const checkboxes = section.querySelectorAll('input[type="checkbox"]');
                const checked = [...checkboxes].filter(c => c.checked);
                if (checked.length > 5) {
                    alert("Maksimal pilih 5 teman!");
                    event.target.checked = false;
                }
            });
        });
    </script>
</x-app-layout>
