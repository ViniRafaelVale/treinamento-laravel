<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\IndexController;

Route::resource('livros', LivroController::class);
Route::get('/', [IndexController::class, 'index']);
// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login']);
// Route::post('logout', [LoginController::class, 'logout']);