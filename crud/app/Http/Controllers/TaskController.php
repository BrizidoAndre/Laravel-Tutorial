<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request) {
        $rules = Task::rules($request->all());

        if (!$rules) {
            return response()->json(Task::create($request->all()), 201);
        }

        return response()->json($rules, 400);
    }

    public function get()
    {
        return response()->json(Task::all());
    }

    public function view(int $id)
    {
        $task = Task::find($id);
        return is_null($task) ? response()->json(['message' => 'Task não encontrada'], 404) : response()->json($task);
    }
}
