<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('user', 'tags')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $tags = Tag::all();
        $users = User::all();
        return view('tasks.create', compact('tags', 'users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3',
            'priority' => 'required',
            'user_id' => 'required|exists:users,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
            // 'completed' => 'required|boolean', // Comenta esta línea temporalmente
        ]);

        $task = Task::create($data);
        $task->tags()->attach($request->tags);

        return redirect('/tasks')->with('success', 'Tarea creada correctamente.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $tags = Tag::all();
        $users = User::all();
        return view('tasks.edit', compact('task', 'tags', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3',
            'priority' => 'required',
            'completed' => 'required|boolean',
            'user_id' => 'required|exists:users,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);

        $task->update($data);
        $task->tags()->sync($request->tags);

        return redirect('/tasks')->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy(Task $task)
    {
        $task->tags()->detach();
        $task->delete();

        return redirect('/tasks')->with('success', 'Tarea eliminada correctamente.');
    }

    public function complete(Task $task)
    {
        $task->completed = true;
        $task->save();

        return redirect()->back()->with('success', 'La tarea se ha marcado como completada.');
    }

}
