@extends('layouts.app')

@section('title', 'Detalle de Tarea')

@section('content')
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0">Tarea ID: {{ $task->id }}</h1>
        </div>
        <div class="card-body">
            <h2>{{ $task->name }}</h2>
            <p>{{ $task->description }}</p>
            @if($task->user)
                <p class="text-muted">Creado por: {{ $task->user->name }}</p>
            @else
                <p class="text-muted">Creado por: Usuario desconocido</p>
            @endif
            <p class="text-muted">Prioridad: {{ $task->priority }}</p>
            <p class="text-muted">Completada: {{ $task->completed ? 'Sí' : 'No' }}</p>
            <p class="text-muted">Etiquetas:
                @foreach($task->tags as $tag)
                    <span class="badge badge-info">{{ $tag->name }}</span>
                @endforeach
            </p>
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
        </div>
    </div>
@endsection
