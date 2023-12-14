@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')
    <div class="">
        <div class="">
            <nav class="mb-4">
                <a href="{{ route('tasks.create') }}" @class(['link'])><i class="fas fa-plus-circle"></i> Add
                    Task!</a>
            </nav>

            <hr class="my-2">
            <p>
                @forelse ($tasks as $task)
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                        @class(['line-through' => $task->completed])>{{ $task->title }}</a><br>
                @empty
                    No tasks yet!
                @endforelse
            </p>

            @if ($tasks->count())
                <nav class="mt-7">
                    {{ $tasks->links() }}
                </nav>
            @endif
        </div>
    </div>
@endsection
