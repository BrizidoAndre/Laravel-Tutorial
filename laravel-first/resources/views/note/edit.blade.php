<x-layout>
    <div class="container pt-5">
        <h2>Atualizar</h2>
        <form method="POST" action="{{route('note.update', $note)}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Note: </label>
                <textarea class="form-control" id="name" rows="6" name="note">{{old('note', $note->note)}}</textarea>
            </div>
            <button class="btn btn-primary">Enviar</button>
        </form>
    </div>
</x-layout>
