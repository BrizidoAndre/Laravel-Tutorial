<x-layout>
    <h1>Current Note: {{$note->created_at}}</h1>
    <div class="d-flex justify-content-between">
        <a href="{{route('note.index')}}" class="btn btn-link">
            Voltar
        </a>
        <div>
                        <a href="{{ route('note.edit', $note) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('note.destroy', $note) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <form action="{{route('note.destroy', $note)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
            </form>
        </div>
    </div>
    <div class="note w-100 m-0 mt-2">
        <div class="note-body">
            {{ $note->note }}
        </div>
    </div>
</x-layout>
