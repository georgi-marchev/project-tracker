<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.get');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');