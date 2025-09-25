<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Models\Notes;
use App\Models\User;
use App\Models\Users;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Notes::query()->orderBy('updated_at', 'desc')->paginate(10);
        return view('notes.index', [
            'notes' => $notes
        ]);
    }

    public function profile()
    {
        $user = User::find(1);
        $notes = $user->notes()->paginate(5);
        return view('notes.profile', [
            'user' => $user,
            'notes' => $notes,
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
    public function store(StoreNoteRequest $request)
    {
        $data = $request->validated();
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['users_id'] = 1;
        Notes::create($data);
        return to_route('notes.index')->with('success', 'Nota criada!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notes $note)
    {

        return view('notes.show', [
            'notes' => $note
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notes $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notes $note)
    {
        //
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
