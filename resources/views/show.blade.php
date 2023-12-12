@extends('layouts.app')

@section('title', $task->title)

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $task->title }}</h4>
    </div>
    <div class="card-body">
        <p class="card-text">{{ $task->description }}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{$task->long_description}}</li>
        <li class="list-group-item">{{$task->completed}}</li>
        <li class="list-group-item">{{$task->created_at}}</li>
        <li class="list-group-item">{{$task->updated_at}}</li>
    </ul>
    <div class="card-footer">
        <p class="card-text">
            <form action="{{route('tasks.destroy', ['task' => $task->id])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </p>
    </div>
</div>
@endsection
