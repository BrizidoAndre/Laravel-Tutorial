<x-layout>
    <a href="{{route('notes.index')}}" class="link">Voltar</a>
    <form action="{{route('notes.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="content" class="form-label">Conteúdo</label>
            <textarea class="form-control" id="content" rows="3" name="content">{{old('content')}}</textarea>
        </div>
        <x-error er="content"/>
        <button class="btn btn-primary">Enviar</button>
    </form>
</x-layout>
