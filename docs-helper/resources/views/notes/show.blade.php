<x-layout>
    <div class="container pt-5">
        <div>
            <p>ID: {{$notes->id}}</p>
            <p>User: {{$notes->user->name}}</p>
            <p>Criado em: {{\Carbon\Carbon::create($notes->created_at)->format('d/m/Y')}}</p>
        </div>
        <p>{{$notes->content}}</p>
    </div>
</x-layout>
