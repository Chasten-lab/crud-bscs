<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users,store', [UserController::class, 'store'])->name('users.store');