<?php
/**
 * @var \App\Models\Notes $note
 */
?>
@component('components.layout')
    <div class="d-flex justify-content-between align-items-center my-3">
        <h2>Notes</h2>
        <a href="{{route('notes.index')}}">Voltar para a lista</a>
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <p><strong>User: </strong>{{$note->user->email}}</p>
        <div class="d-flex gap-2 align-items-baseline">
            <a href="{{route('notes.edit', $note)}}" class="btn btn-primary">Edit</a>
            <form action="{{route('notes.destroy', $note)}}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-danger">Remove</button>
            </form>
        </div>
    </div>
    <p class="fs-3"><strong>Content:</strong> {{$note->content}}</p>
@endcomponent

