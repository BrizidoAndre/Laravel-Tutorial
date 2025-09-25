<?php
$types = [
    'danger',
    'warning',
    'success',
]
?>
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('public/bootstrap.min.css')}}">
</head>
<body>
<div class="container pt-4">
    @foreach($types as $type)
        @if(session($type))
            <div class="alert alert-{{$type}}" role="alert">
                {{session()->get($type)}}
            </div>
        @endif
    @endforeach
    {{$slot}}
</div>
</body>
</html>
