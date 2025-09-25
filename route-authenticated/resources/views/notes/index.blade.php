<x-layout>
    <h2>Notes</h2>
    <a href="{{route('notes.create')}}" class="btn btn-primary">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Note</th>
            <th scope="col">User responsible</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($notes as $note)
            <tr>
                <td>{{$note->content}}</td>
                <td>{{$note->user->name}}</td>
                <td class="d-flex gap-2">
                    <a href="{{route('notes.show', $note)}}" class="btn btn-primary">View</a>
                    <a href="{{route('notes.edit', $note)}}" class="btn btn-secondary">Edit</a>
                    <form action="{{route('notes.destroy', $note)}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-layout>

