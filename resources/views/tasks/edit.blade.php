@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Task Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $task->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <select class="form-control" id="priority" name="priority">
                <option value="Alta" {{ $task->priority == 'Alta' ? 'selected' : '' }}>Alta</option>
                <option value="Media" {{ $task->priority == 'Media' ? 'selected' : '' }}>Media</option>
                <option value="Baja" {{ $task->priority == 'Baja' ? 'selected' : '' }}>Baja</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="completed" class="form-label">Completed</label>
            <select class="form-control" id="completed" name="completed">
                <option value="1" {{ $task->completed ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$task->completed ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select class="form-control" id="user_id" name="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $task->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
