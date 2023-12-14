@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" @class(['link'])><i class="fa fa-arrow-circle-left"
                aria-hidden="true"></i> Go back to Task Lists</a>
    </div>

    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-slate-700">
        <label class="switch">
            <input id="js-toggle" type="checkbox" @if ($task->completed) checked @endif>
            <span class="slider round"></span>
        </label>
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not Completed</span>
        @endif
    </p>

    <p class="mb-4 text-sm text-slate-500">
        Created {{ $task->created_at->diffForHumans() }} <i class="fas fa-dot-circle"></i>
        Updated {{ $task->updated_at->diffForHumans() }}
    </p>


    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn">Edit</a>

        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" id="js-form-toggle" method="post"
            @class(['mb-2', 'font-bold' => true])>
            @csrf
            @method('PUT')
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>

@endsection
