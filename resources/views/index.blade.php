@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container card p-4">
        <h1 class="display-3">Tasks Lists</h1>
        <p class="lead">All created tasks</p>
        <hr class="my-2">
        <p>
            @forelse ($tasks as $task)
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="btn btn-primary mb-2" >{{ $task->title }}</a><br>
            @empty
            No tasks yet!
            @endforelse
        </p>
        @if ($tasks->count())
            {{ $tasks->links() }}
        @endif
    </div>
</div>
@endsection
