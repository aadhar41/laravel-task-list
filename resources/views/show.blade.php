@extends('layouts.app')

@section('title', $task->title)

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ $task->title }}</h4>
        <p class="card-text">{{ $task->description }}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{$task->long_description}}</li>
        <li class="list-group-item">{{$task->completed}}</li>
        <li class="list-group-item">{{$task->created_at}}</li>
        <li class="list-group-item">{{$task->updated_at}}</li>
    </ul>
</div>
@endsection
