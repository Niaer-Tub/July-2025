<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Jawaban Sosiometri</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">
        <<form action="{{ route('student.answers.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-6">
    @csrf

    @foreach($questions as $question)
        <div>
            <label class="font-semibold">{{ $loop->iteration }}. {{ $question->text }}</label>
            <select name="answers[{{ $question->id }}][]" multiple required
                class="mt-2 w-full border px-3 py-2 rounded" size="5">
                @foreach($students as $student)
                    @if($student->id !== auth()->id())
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endif
                @endforeach
            </select>
            <small class="text-gray-500">Pilih 1–5 teman</small>
        </div>
    @endforeach

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
        Kirim Jawaban
    </button>
</form>
    </div>
</x-app-layout>
