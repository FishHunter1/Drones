<?php

use App\Http\Controllers\DronesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroEController;
use App\Http\Controllers\ListeController;
use App\Http\Controllers\ListrController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistroCController;
use App\Http\Controllers\ListcController;
use App\Http\Controllers\ReportesMController;
use App\Http\Controllers\ReportesIController;
use App\Http\Controllers\MapaController;
use App\Http\Controllers\CrearutaController;
use App\Http\Controllers\listaruController;
use App\Http\Controllers\RutasdController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PagosController;

Route::get('/', HomeController::class)->name('home');

Route::get('/authentication/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/authentication/register', function () {
    return view('auth.register');
})->name('register');

route::get('/dashboard', function (){
    return view('dashboard');
})->name('dashboard');

route::get('/dashboard/forme', function (){
    return view('empleados.forme');
})->name('forme');

route::get('/dashboard/liste', function (){
    return view('empleados.liste');
})->name('liste');

Route::get('/dashboard/formc', function (){
    return view('camiones.formc');
})->name('formc');

Route::get('/dashboard/listc', function (){
    return view('camiones.listc');
})->name('listc');

Route::get('/dashboard/listar', function (){
    return view('reportes.listar');
})->name('listar');

Route::get('/dashboard/reportesi', function (){
    return view('reportes.reportesi');
})->name('reportesi');

Route::get('/dashboard/reportesm', function (){
    return view('reportes.reportesm');
})->name('reportesm');

Route::get('/dashboard/listr', function (){
    return view('reportes.listr');
})->name('listr');

Route::get('/dashboard/mapa', function (){
    return view('mapa.mapa');
})->name('mapa');

Route::get('/dashboard/listaru', function (){
    return view('rutas.listaru');
})->name('listaru');

Route::get('/dashboard/crearuta', function (){
    return view('rutas.crearuta');
})->name('crearuta');

Route::get('/dashboard/rutasd', function (){
    return view('rutas.rutasd');
})->name('rutasd');

Route::get('/dashboard', [DashboardController::class, 'indexado'])->name('dashboard');

Route::prefix('/authentication')->group(function () {
    Route::post('/login', [LoginController::class, 'perform'])->name('login.perform');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::prefix('/dashboard')->group(function () {
    Route::post('/crear', [RegistroEController::class, 'create'])->name('RegistroE.create');
    Route::get('/liste', [ListeController::class, 'index'])->name('liste');
    Route::post('/crearc', [RegistroCController::class, 'createc'])->name('RegistroC.createc');
    Route::get('/formc', [RegistroCController::class, 'showForm'])->name('formc');
    Route::get('/listc', [ListcController::class,'indexi'])->name('listc');
    Route::get('/reportesm', [ReportesMController::class, 'showForma'])->name('reportesm');
    Route::post('/crearm', [ReportesMController::class, 'createm'])->name('ReportesM.createm');
    Route::get('/reportesi', [ReportesIController::class,'showformi'])->name('reportesi');
    Route::post('/creari', [ReportesIController::class,'createi'])->name('ReportesI.createi');
    Route::get('/listr', [ListrController::class,'indexr'])->name('listr');
    Route::get('/mapa', [MapaController::class, 'showMapa'])->name('mapa');
    Route::get('/ubicacion', [MapaController::class, 'getUbicacionVehiculo'])->name('ubicacion');
    Route::get('/crearuta', [CrearutaController::class,'showformol'])->name('crearuta');
    Route::post('/crearuta', [CrearutaController::class,'creara'])->name('Crearuta.creara');
    Route::get('/listaru', [listaruController::class,'indexRutas'])->name('listaru');
    Route::get('/rutasd/{id}', [RutasdController::class, 'detalle'])->name('rutas.detalle');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout');
    Route::get('/dashboard', [DashboardController::class, 'indexado'])->name('dashboard');

    Route::get('/payment-confirmation/{pago}', [PagosController::class, 'showConfirmation'])->name('payment.confirmation');
    Route::get('/payment-receipt/{pago}', [PagosController::class, 'showReceipt'])->name('payment.receipt');
});
