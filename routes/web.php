<?php

use Illuminate\Support\Facades\Route;
// Tabnine: explain this code
Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('Auth/login');
})->name('login');

Route::get('/signup', function () {
    return view('Auth/signup');
})->name('signup');

