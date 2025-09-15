<x-layout>
    <div class="container pt-5">
        <h1>Cadastrar</h1>
        <form method="post" action="{{route('note.store')}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Note: </label>
                <textarea class="form-control" id="name" rows="3" name="note"></textarea>
            </div>
            <button class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <x-subtitle message="banana">

    </x-subtitle>
</x-layout>
