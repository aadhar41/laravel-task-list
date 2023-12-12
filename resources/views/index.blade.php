@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container card p-4">
        <h1 class="display-3">Fluid jumbo heading</h1>
        <p class="lead">Jumbo helper text</p>
        <hr class="my-2">
        <p>
            @forelse ($tasks as $task)
            <a href="{{ route('tasks.show', ['id' => $task->id]) }}" class="btn btn-primary mb-2" >{{ $task->title }}</a><br>
            @empty
            No tasks yet!
            @endforelse
        </p>
    </div>
</div>
@endsection
