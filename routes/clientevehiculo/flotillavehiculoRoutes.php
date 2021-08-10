<?php
use App\Http\Controllers\ClienteVehiculo\FlotillaVehiculoController;
Route::post('', [FlotillaVehiculoController::class, 'index'])->name('flotillav.index')->middleware('permission:flotillav.create|flotillav.show|flotillav.edit|flotillav.destroy');;