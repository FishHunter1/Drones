<?php

use App\Http\Controllers\DronesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', HomeController::class)->name('home');

Route::get('/authentication/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/authentication/register', function () {
    return view('auth.register');
})->name('register');

route::get('/dashboard', action: function (){
    return view('dashboard');
})->name('dashboard');

Route::prefix('/authentication')->group(function () {
    Route::post('/login', [LoginController::class, 'perform'])->name('login.perform');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

