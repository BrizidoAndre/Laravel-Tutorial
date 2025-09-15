<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Faker\Factory;
use Illuminate\Http\Request;
use Psy\Util\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use function PHPUnit\Framework\isNull;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()->orderBy('created_at', 'asc')->paginate(5);
        return view('note.index', [
            'notes' => $notes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'note' => ['required', 'string']
        ]);
        $data['user_id'] = 1;
        $note = Note::create($data);
        return to_route('note.show', $note)->with('message', 'Note was created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $note = $this->findModel($id);
        return view('note.show', [
            'note' => $note
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $note = $this->findModel($id);
        return view('note.edit', [
            'note' => $note
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $note = $this->findModel($id);
        $data = $request->validate([
            'note' => ['required', 'string']
        ]);
        $note->update($data);
        return to_route('note.show', $note->id)->with('message', 'Note was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $note = $this->findModel($id);
        $note->delete();
        return to_route('note.index')->with('message', 'Note was deleted');
    }

    public function findModel($id)
    {
        $data = Note::find($id);
        if (is_null($data)) {
            abort(404, 'Unfortunately the note was not found');
        }
        return $data;
    }
}
