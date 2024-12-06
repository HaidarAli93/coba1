<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'goToLogin']);

// Route to handle the login form submission (POST request)
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/landing-page', [LoginController::class, 'goToLandingPage']);
});

Route::get('/products', [ProductController::class, 'getProduct']);
