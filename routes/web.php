<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task as ModelsTask;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return redirect()->route('tasks.index');
})->name('home');

Route::get('/tasks', function () {
    return view('index', [
        "title" => "Tasks",
        "tasks" => ModelsTask::latest()->where('completed', true)->paginate(10)
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}', function(ModelsTask $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');


Route::post('/tasks', function(TaskRequest $request) {
  $data = $request->validated();
  $task = ModelsTask::create($data);
  return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task created successfully!!');
})->name('tasks.store');


Route::get('/tasks/{task}/edit', function(ModelsTask $task) {
  return view('edit', ['task' => $task]);
})->name('tasks.edit');


Route::put('/tasks/{task}', function(ModelsTask $task, TaskRequest $request) {
  $data = $request->validated();
  $task->update($data);
  return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated successfully!!');
})->name('tasks.update');


Route::delete('/tasks/{task}', function(ModelsTask $task) {
  $task->delete();
  return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!!');
})->name('tasks.destroy');


Route::fallback(function() {
    return 'This is the fallback route.';
});