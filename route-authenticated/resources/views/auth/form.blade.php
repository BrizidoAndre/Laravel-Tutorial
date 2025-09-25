<x-layout>
    <h2 class="my-3">Login</h2>
    <form action="{{route('auth.login')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button class="btn btn-primary">Enviar</button>
        @if($errors->has('general'))
            <p class="text-danger">{{$errors->get('general')}}</p>
        @endif
    </form>
    <h2 class="my-3">Cadastrar</h2>
    <form action="{{route('auth.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button class="btn btn-primary">Enviar</button>
    </form>
</x-layout>
