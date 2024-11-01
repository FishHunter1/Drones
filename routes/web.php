<?php

use App\Http\Controllers\DronesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', HomeController::class)->name('home');

// Separate GET route to show the login form
Route::get('/authentication/login', function () {
    return view('auth.login'); // Adjusted to point to the 'drones' folder
})->name('login');

// Separate GET route to show the registration form
Route::get('/authentication/register', function () {
    return view('auth.register'); // Adjusted to point to the 'drones' folder
})->name('register');

Route::prefix('/authentication')->group(function () {
    // Route to handle login submission
    Route::post('/login', [LoginController::class, 'perform'])->name('login.perform');
    
    // Route to handle registration submission
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    
    // Route to handle logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
