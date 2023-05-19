<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\TaskController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('Todolist/create', [App\Http\Controllers\TodoListController::class, 'create'])->name('todocreate');
    Route::get('Todo-view', [App\Http\Controllers\TodoListController::class, 'index'])->name('todolist');
   
    Route::post('Store-data', [App\Http\Controllers\TodoListController::class, 'store' ])->name('todostore');
    Route::get('edit-todolist/{id}', [App\Http\Controllers\TodoListController::class, 'edit'])->name('editpost');
    Route::put('update-todolist/{id}', [App\Http\Controllers\TodoListController::class, 'update']);
    Route::get('delete-todolist/{id}', [App\Http\Controllers\TodoListController::class, 'delete']);

    Route::get('Task/Create', [App\Http\Controllers\TaskController::class, 'index'])->name('taskcreate');
    Route::post('Task/store', [App\Http\Controllers\TaskController::class, 'storetask'])->name('taskstore');
    Route::get('View/tasks', [App\Http\Controllers\TaskController::class, 'view'])->name('viewtask');
    Route::get('edit-task/{id}', [App\Http\Controllers\TaskController::class, 'edit'])->name('editpost');
    Route::put('update-task/{id}', [App\Http\Controllers\TaskController::class, 'update']);
    Route::get('delete-task/{id}', [App\Http\Controllers\TaskController::class, 'delete']);
    Route::post('Task/complete', [App\Http\Controllers\TaskController::class, 'taskstatus'])->name('taskcomplete');
    Route::get('Task-Reshedule/{id}',  [App\Http\Controllers\TaskController::class, 'reshedule']);
    Route::put('update-Reshedule/{id}', [App\Http\Controllers\TaskController::class, 'resheduleupdate']);

    
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
