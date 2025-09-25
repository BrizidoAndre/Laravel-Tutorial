<x-layout>

    <ul>
        <li>Usuário: {{$user->name}}</li>
        <li>Email: {{$user->email}}</li>
    </ul>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Usuário</th>
            <th scope="col">Conteúdo</th>
            <th scope="col">Data</th>
        </tr>
        </thead>
        <tbody>
        @foreach($notes as $note)
            <tr>
                <td>{{$note->id}}</td>
                <td>{{$note->content}}</td>
                <td>{{$note->user->name}}</td>
                <td>{{\Carbon\Carbon::parse($note->created_at)->format('d/m/Y')}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$notes->links()}}
</x-layout>
