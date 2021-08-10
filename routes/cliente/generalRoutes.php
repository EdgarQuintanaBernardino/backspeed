<?php
use App\Http\Controllers\Cliente\GeneralController;

Route::post('almacenar',[GeneralController::class, 'store'])->name('general.create');
Route::post('get/{id_user}', [GeneralController::class, 'get'])->name('general.get')->middleware('permission:general.show');
Route::post('show/{id}', [GeneralController::class, 'show'])->name('general.show')->middleware('permission:general.show');

Route::post('actualizar/{id_user}', [GeneralController::class, 'update'])->name('general.update')->middleware('permission:general.edit|general.show');
Route::post('getAll', [GeneralController::class, 'getAllCache'])->name('general.getAllCache');
Route::post('', [GeneralController::class, 'index'])->name('general.index')->middleware('permission:general.create|general.show|general.edit|general.destroy');