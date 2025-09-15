<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/css/bootstrap.min.css', 'resources/js/app.js'])
</head>
<body class="antialised container mt-3">
<nav class="navbar">
    <div class="container-fluid">
        @if(\Illuminate\Support\Facades\Auth::check())
            <p class="navbar-brand">O usuário está logado</p>
            <a href="{{route('login.destroy')}}" class="btn btn-danger">Logout</a>
        @else
            <p class="navbar-brand">O usuário NÃO está logado</p>
        @endif
    </div>
</nav>
@session('message')
<div class="success-message">
    {{session('message')}}
</div>
@endsession
{{ $slot }}
</body>
</html>
