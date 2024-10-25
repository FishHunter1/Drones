<?php

use App\Http\Controllers\DronesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name(name: 'home');

#Route::prefix('/Dron')->controller(DronesController::class)->group(function () {
#    Route::get('/', 'suscripciones' )->name('Dron.Suscripciones');
#});
