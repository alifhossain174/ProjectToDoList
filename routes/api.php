<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'Api'], function () {

    // user profile related API
    Route::post('user/login', [App\Http\Controllers\Api\ApiController::class, 'userLogin']);
    Route::post('user/register', [App\Http\Controllers\Api\ApiController::class, 'userRegistration']);
    Route::post('user/forget/password', [App\Http\Controllers\Api\ApiController::class, 'userForgetPassword']);
    Route::post('user/change/password', [App\Http\Controllers\Api\ApiController::class, 'userChangePassword']);
    Route::post('user/profile/update', [App\Http\Controllers\Api\ApiController::class, 'userProfileUpdate']);

    // task related API
    Route::post('/user/todo/lists', [App\Http\Controllers\Api\ApiController::class, 'toDoList'])->name('toDoList');
    Route::post('/user/create/todo/lists', [App\Http\Controllers\Api\ApiController::class, 'saveTask'])->name('saveTask');
    Route::post('/user/change/task/status', [App\Http\Controllers\Api\ApiController::class, 'changeTaskStatus'])->name('changeTaskStatus');
    Route::get('/user/task/view/{slug}', [App\Http\Controllers\Api\ApiController::class, 'taskView'])->name('taskView');
    Route::post('/user/task/update', [App\Http\Controllers\Api\ApiController::class, 'taskUpdate'])->name('taskUpdate');

});
