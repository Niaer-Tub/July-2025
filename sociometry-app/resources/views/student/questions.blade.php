<x-app-layout>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Jawab Pertanyaan</h2>

        <form action="{{ route('student.answers.store') }}" method="POST">
            @csrf

            @foreach($questions as $question)
                <div class="mb-6">
                    <label class="block mb-2 font-semibold">
                        {{ $loop->iteration }}. {{ $question->text }}
                    </label>

                    <select name="answers[{{ $question->id }}][]" multiple required
                            class="w-full border px-3 py-2 rounded" size="5">
                        @foreach($students as $student)
                            @if($student->id !== auth()->id())
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <small class="text-gray-500">Pilih 1–5 teman</small>
                </div>
            @endforeach

            <div class="mt-6">
                <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
                    Kirim Jawaban
                </button>

            </div>
        </form>
    </div>
</x-app-layout>
