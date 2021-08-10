<?php
use App\Http\Controllers\ClienteVehiculo\ClienteVehiculoController;
Route::post('', [ClienteVehiculoController::class, 'index'])->name('clientev.index')->middleware('permission:clientev.create|clientev.show|clientev.edit|clientev.destroy');;