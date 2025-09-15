<?php
/**
 * @var \Illuminate\Pagination\LengthAwarePaginator $notes
 */
?>
<x-layout>
    <div class="container">
        <h1>Index</h1>
        <a href="{{route('note.create')}}" class="btn btn-primary">New note</a>
        <div class="notes p-0">
            @foreach($notes as $note)
                <div class="note">
                    <div class="note-body">
                        {{ Str::words($note->note, 30) }}
                    </div>
                    <div class="note-buttons">
                        <a href="{{ route('note.show', $note) }}" class="note-edit-button">View</a>
                        <a href="{{ route('note.edit', $note) }}" class="note-edit-button">Edit</a>
                        <form action="{{ route('note.destroy', $note) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="note-delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        {{$notes->links()}}
    </div>
</x-layout>
