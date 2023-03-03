<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {

    // for ckeditor file upload
    Route::get('ckeditor', [App\Http\Controllers\CkeditorController::class, 'index']);
    Route::post('ckeditor/upload', [App\Http\Controllers\CkeditorController::class, 'upload'])->name('ckeditor.upload');

    // to do routes
    Route::get('/my/todo/lists', [App\Http\Controllers\ToDoController::class, 'toDoList'])->name('toDoList');
    Route::get('/create/new/tasks', [App\Http\Controllers\ToDoController::class, 'createTask'])->name('createTask');
    Route::post('/save/task', [App\Http\Controllers\ToDoController::class, 'saveTask'])->name('saveTask');
    Route::get('/done/task/{slug}', [App\Http\Controllers\ToDoController::class, 'doneTask'])->name('doneTask');
    Route::get('/delete/task/{slug}', [App\Http\Controllers\ToDoController::class, 'deleteTask'])->name('deleteTask');
    Route::get('/edit/task/{slug}', [App\Http\Controllers\ToDoController::class, 'editTask'])->name('editTask');
    Route::get('/view/task/{slug}', [App\Http\Controllers\ToDoController::class, 'viewTask'])->name('viewTask');
    Route::post('/update/task', [App\Http\Controllers\ToDoController::class, 'updateTask'])->name('updateTask');

});
