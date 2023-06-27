<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
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

Route::get('/', function (Request $request) {
    $projectId = $request->input('project_id');
    $projects = Project::all();
    $tasks = Task::orderBy('priority')->get();
    return view('index', compact('tasks', 'projects', 'projectId'));
});

// Route to handle all tasks urls
Route::resources([
    'tasks' => TaskController::class,
    'projects' => ProjectController::class,
]);

// Reorder tasks route
Route::post('tasks/reorder', [TaskController::class, 'reorder'])->name('tasks.reorder');
Route::post('tasks/projectfilter', [TaskController::class, 'projectfilter'])->name('tasks.projectfilter');

// Route::get('/projects/{project}', function (Project $project) {
//     return view('tasks.index', ['project' => $project, 'tasks' => $project->tasks->orderBy('priority')->get()]);
// })->name('project');