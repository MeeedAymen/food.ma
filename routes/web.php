<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/login', function () {
//     return view('Auth/login');
// })->name('login');

// Route::get('/signup', function () {
//     return view('Auth/signup');
// })->name('signup');

// Routes pour l'authentification
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignupForm']);
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
