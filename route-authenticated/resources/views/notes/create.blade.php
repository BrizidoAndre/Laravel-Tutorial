<?php
/**
 * @var \App\Models\Notes @note
 */
?>
<x-layout>
    <h2>Criando</h2>
    <form action="{{route('notes.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Conteúdo</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                      name="content"></textarea>
            @error('content')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button class="btn btn-primary">Enviar</button>
    </form>
</x-layout>

