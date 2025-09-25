<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body>
<header>
    <!-- As a link -->
    <nav class="navbar bg-dark-subtle">
        <div class="container">
            @if(\Illuminate\Support\Facades\Auth::check())
                <h1>Logado</h1>
                <a href="{{route('auth.logout')}}" class="btn btn-danger">Logout</a>
            @else
                <h2>Público</h2>
            @endif
        </div>
    </nav>
</header>
<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{session()->get('message')}}
        </div>
    @endif
    {{$slot}}
</div>
</body>
</html>
