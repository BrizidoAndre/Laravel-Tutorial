<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CustomAuthMiddleware;
use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Notes::query()->orderBy('created_at', 'desc')->paginate(5);
        return view('notes.index', [
            'notes' => $notes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => ['required', 'string', 'min:30']
        ]);
        $data['user_id'] = Auth::id();
        Notes::create($data);
        return to_route('notes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notes $note)
    {
        return view('notes.show', [
            'note' => $note
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notes $note)
    {
        return view('notes.edit', [
            'note' => $note
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notes $note)
    {
        $data = $request->validate([
            'content' => ['required', 'string'],
        ]);
        $note->update($data);
        return to_route('notes.show', $note);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notes $note)
    {
        $note->delete();
        return to_route('notes.index');
    }
}
