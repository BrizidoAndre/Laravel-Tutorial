<x-layout>
    <h1>Login</h1>
    @if(auth()->check())
        <p>Already logged in {{auth()->user()->email}}</p>
        <a href="{{route('login.destroy')}}" class="btn btn-danger">Logout</a>
    @else
        @error('error')
        <span>{{$message}}</span>
        @enderror
        <p>Por favor preencha os campos a seguir para realizar o login do usuário</p>
        <form action="{{route('login.log')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email"
                       value="{{old('email')}}">
                @error('email')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div class=" mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                @error('password')
                <span>{{$message}}</span>
                @enderror
            </div>
            <button class="btn btn-primary">Enviar</button>
        </form>
    @endif
</x-layout>
