<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        try {
            $todos = Todo::orderBy('created_at', 'desc')->get();
        } catch (\Exception $e) {
            $todos = collect();
        }

        return view('todo.index', compact('todos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|min:5|max:25',
        ], [
            'task.required' => 'Task is required',
            'task.min' => 'Task must be at least 5 characters',
            'task.max' => 'Task must be less than 25 characters',
        ]);

        $data = [
            'task' => $request->input('task'),
            'is_done' => false
        ];

        try {
            Todo::create($data);
            return redirect()->route('todo')->with('success', 'Task added successfully');
        } catch (\Exception $e) {
            return redirect()->route('todo')->with('error', 'Unable to add task (database not available)');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $todo = Todo::findOrFail($id);
        $data = $request->only(['task', 'is_done']);
        if (isset($data['is_done'])) {
            $data['is_done'] = (bool) $data['is_done'];
        }
        $todo->update(array_filter($data, fn($v) => $v !== null));
        return redirect()->route('todo')->with('success', 'Task updated');
    }

    public function destroy(string $id)
    {
        try {
            $todo = Todo::findOrFail($id);
            $todo->delete();
            return redirect()->route('todo')->with('success', 'Task deleted');
        } catch (\Exception $e) {
            return redirect()->route('todo')->with('error', 'Unable to delete task (not found or DB error)');
        }
    }
}
