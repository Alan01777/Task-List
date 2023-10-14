<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// tasks
Route::get('/tasks', [TaskController::class, 'taskIndex'])->name('tasks.index');

Route::get('/task/create', [TaskController::class, 'taskCreate'])->name('tasks.create');
Route::post('/tasks', [TaskController::class , 'taskStore'])->name('tasks.store');

Route::get('/task/{task}', [TaskController::class, 'taskShow'])->name('tasks.show');

Route::get('/task/{task}/edit', [TaskController::class, 'taskEdit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'taskUpdate'])->name('tasks.update');

Route::delete('task/{task}', [TaskController::class, 'taskDestroy'])->name('tasks.destroy');

Route::put('task/{task}/complete', [TaskController::class, 'taskComplete'])->name('tasks.complete');


//user
Route::get('/', [UserController::class, 'redirectIndex']);

Route::get('/login', [UserController::class, 'UserLogin'])->name('user.login');
Route::post('/login', [UserController::class, 'userAuth'])->name('user.auth');

Route::get('/user/create', [UserController::class, 'userCreate'])->name('user.create');
Route::post('/user/create', [UserController::class, 'userStore'])->name('user.store');

Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');

Route::get('/user/{user}', [UserController::class, 'userShow'])->name('user.show');

Route::get('/user/{user}/edit', [UserController::class, 'userEdit'])->name('user.edit');
Route::put('/user/{user}', [UserController::class, 'userUpdate'])->name('user.update');

Route::delete('/user/{user}', [UserController::class, 'userDestroy'])->name('user.destroy');


// fallback
Route::fallback(function () {
    return view('404');
})->name('tasks.404');
