@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="post">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @else is-valid @enderror" name="title" id="title" aria-describedby="helpId" placeholder="Title" value="{{ $task->title ?? old('title') }}">
          @error('title')
          <small id="errorTitle" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control @error('description') is-invalid @else is-valid @enderror" name="description" id="description" rows="5">{{$task->description ?? old('description')}}</textarea>
          @error('description')
          <small id="errorDescription" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="long_description">Long Description</label>
          <textarea class="form-control @error('long_description') is-invalid @else is-valid @enderror" name="long_description" id="long_description" rows="10">{{$task->long_description ?? old('long_description')}}</textarea>
          @error('long_description')
          <small id="errorLongDescription" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">
            @isset($task)
                Update Task
            @else    
                Add Task
            @endisset
        </button>
    </form>
@endsection
