<?php

use App\Models\Task as ModelsTask;
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
        "tasks" => ModelsTask::latest()->where('completed', true)->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function($id) {
    return view('show', ['task' => ModelsTask::findOrFail($id)]);
})->name('tasks.show');


Route::post('/tasks', function() {
  // request()->all();
  dd(request()->all());
})->name('tasks.store');


Route::fallback(function() {
    return 'This is the fallback route.';
});