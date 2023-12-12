@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Title">
          <small id="helpId" class="form-text text-muted">Enter Title</small>
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description" rows="5"></textarea>
        </div>
        
        <div class="form-group">
          <label for="long_description">Long Description</label>
          <textarea class="form-control" name="long_description" id="long_description" rows="10"></textarea>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
