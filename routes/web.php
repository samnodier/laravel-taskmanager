<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
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
    $tasks = Task::orderBy('priority')->get();
    return view('index', compact('tasks'));
});

// Route to handle all tasks urls
Route::resource('tasks', TaskController::class);

// Reorder tasks route
Route::post('tasks/reorder', [TaskController::class, 'reorder'])->name('tasks.reorder');
