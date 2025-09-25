<x-layout>
    <div class="container pt-5">
        <div class="d-flex justify-content-between">
            <h2>Notas</h2>
            <a href="{{route('notes.create')}}" class="link">Criar</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Conteúdo</th>
                <th scope="col">Usuário</th>
                <th scope="col">Data</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notes as $note)
                <tr>
                    <td>{{$note->id}}</td>
                    <td>{{$note->content}}</td>
                    <td>{{$note->user->name}}</td>
                    <td>{{\Carbon\Carbon::parse($note->created_at)->format('d/m/Y')}}</td>
                    <td>
                        <form action="{{route('notes.destroy', $note)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$notes->links()}}
    </div>
</x-layout>
