<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::resource('tasks', TaskController::class);

// Extra route for marking tasks as complete/pending
Route::put('tasks/{task}/toggle', [TaskController::class, 'toggleStatus'])->name('tasks.toggle');

