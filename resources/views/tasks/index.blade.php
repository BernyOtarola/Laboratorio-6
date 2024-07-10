@extends('layouts.app')

@section('title', 'Lista de Tareas')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Tareas</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Nueva Tarea</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Prioridad</th>
                <th>Completada</th>
                <th>Usuario</th>
                <th>Etiquetas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a></td>
                    <td><span class="badge badge-warning">{{ $task->priority }}</span></td>
                    <td>{{ $task->completed ? 'Sí' : 'No' }}</td>
                    <td>{{ $task->user ? $task->user->name : 'Usuario desconocido' }}</td>
                    <td>
                        @foreach($task->tags as $tag)
                            <span class="badge badge-info">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-success btn-sm">Editar</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline-block"
                            onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta tarea?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        <form action="{{ route('tasks.complete', $task->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-primary btn-sm">Completar</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection