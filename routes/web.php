<?php

use App\Http\Controllers\DronesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name(name: 'home');

Route::prefix('/authentication')->controller(DronesController::class)->group(function () {
    Route::get('/login', 'loginpage')->name('Dron.login');
    Route::get('/register', 'registerpage')->name('Dron.register');
});


