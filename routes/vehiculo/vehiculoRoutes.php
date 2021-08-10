<?php
use App\Http\Controllers\Vehiculo\VehiculoController;

Route::post('almacenar',  [VehiculoController::class, 'store'])->name('vehiculo.create');
Route::post('getAll', [VehiculoController::class, 'getAllCache'])->name('vehiculo.getAllCache');
Route::post('get/{id_vehiculo}', [VehiculoController::class, 'get'])->name('vehiculo.get')->middleware('permission:vehiculo.show');
Route::post('actualizar/{id_vehiculo}', [VehiculoController::class, 'update'])->name('vehiculo.update')->middleware('permission:vehiculo.edit');
Route::post('delete/{id_vehiculo}', [VehiculoController::class, 'delete'])->name('vehiculo.delete')->middleware('permission:vehiculo.delete');;
Route::post('', [VehiculoController::class, 'index'])->name('vehiculo.index')->middleware('permission:vehiculo.create|vehiculo.show|vehiculo.edit|vehiculo.destroy');;