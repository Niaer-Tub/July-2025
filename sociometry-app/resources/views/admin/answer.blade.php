<x-app-layout>
    <x-slot name="header">All Student Answers</x-slot>

    <div class="p-6">
        @foreach($answers as $answer)
            <div class="border p-3 mb-3">
                <p><strong>{{ $answer->user->name }}</strong> answered:</p>
                <p>Question: {{ $answer->question->text }}</p>
                <p>Selected Friends:</p>
                <ul class="list-disc list-inside">
                    @foreach($answer->selectedFriends as $friend)
                        <li>{{ $friend->name }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</x-app-layout>
