@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="post">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div class="form-group mb-4">
            <label class="label" for="title">Title</label>
            <input type="text" @class(['border-red-500' => $errors->has('title')])
                class="input form-control @error('title') is-invalid @else is-valid @enderror" name="title" id="title"
                aria-describedby="helpId" placeholder="Title" value="{{ $task->title ?? old('title') }}">
            @error('title')
                <small id="errorTitle" class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label class="label" for="description">Description</label>
            <textarea placeholder="Description" @class(['textarea', 'border-red-500' => $errors->has('description')]) name="description" id="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <small id="errorDescription" class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label class="label" for="long_description">Long Description</label>
            <textarea placeholder="Long Description" @class([
                'textarea',
                'border-red-500' => $errors->has('long_description'),
            ]) name="long_description" id="long_description"
                rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <small id="errorLongDescription" class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="flex items-center gap-2">

            <button type="submit" class="btn">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
            <a href="{{ route('tasks.index') }}" @class(['link'])>Cancel</a>
        </div>
    </form>
@endsection
