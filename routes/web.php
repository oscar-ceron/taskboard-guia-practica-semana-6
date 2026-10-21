<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComercioController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\EventoTransaccionController;

Route::get('/', function () {
return view('welcome');
});
Route::get('/taskboard', function () {
return 'Bienvenido a TaskBoard, tu pasarela de pagos.';
});

Route::get('/acerca-de',function () {
    return 'Esto es taskboard, una pasarela de pagos para tu negocio.';
});

Route::get('/contacto', function () {
    return 'Oscar Alexander Cerón Hernandez, correo: oscar.ceron64069@uped.edu.sv';
});

Route::get('/estados', function () {
    return [
        "Iniciada", "Procesando", "Aprobada", "Rechazada", "Liquidada"
    ];
});

Route::get('transaccion/demo', function () {
    return [
        "id" => 1,
        "comercio" => "Café Amanecer",
        "monto" => 25.50,
        "moneda" => "USD",
        "estado" => "Aprobada",
    ];
});

Route::get('/transaccion/{transaccion}', [TransaccionController::class, 'show'])
    ->name('transaccion.show');


Route::get('/transacciones', [TransaccionController::class, 'index'])->name('transacciones.index');

Route::get('/eventos-transaccion', [EventoTransaccionController::class, 'index'])->name('eventos-transaccion.index');

Route::prefix('comercios')->name('comercios.')->group(function () {
    Route::get('/', [ComercioController::class, 'index'])->name('index');

    Route::get('/comercio/{comercio}', [ComercioController::class, 'show']);
});

Route::prefix('transacciones')->name('transacciones.')->group(function () {
    Route::get('/', [TransaccionController::class, 'index'])->name('index');

    Route::get('/transaccion/{transaccion}', [TransaccionController::class, 'show']);
});

Route::prefix('eventos-transaccion')->name('eventos-transaccion.')->group(function () {
    Route::get('/', [EventoTransaccionController::class, 'index'])->name('index');
});