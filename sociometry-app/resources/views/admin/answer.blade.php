<h2 class="text-xl font-semibold mt-10 mb-4">Jawaban Siswa</h2>

@if($answers->isEmpty())
    <p class="text-gray-500">Belum ada jawaban.</p>
@else
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2 border">Nama Siswa</th>
                <th class="p-2 border">Pertanyaan</th>
                <th class="p-2 border">Jawaban</th>
            </tr>
        </thead>
        <tbody>
            @foreach($answers as $answer)
                <tr>
                    <td class="p-2 border">{{ $answer->user->name ?? '-' }}</td>
                    <td class="p-2 border">{{ $answer->question->text ?? '-' }}</td>
                    <td class="p-2 border">
                        @foreach(json_decode($answer->selected_names, true) as $name)
                            <span class="inline-block bg-gray-200 px-2 py-1 rounded text-sm mr-1">{{ $name }}</span>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
