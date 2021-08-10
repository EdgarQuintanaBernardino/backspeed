<?php
use App\Http\Controllers\Cita\CitaController;

Route::post('almacenar',  [CitaController::class, 'store'])->name('cita.store')->middleware('permission:cita.store');
Route::post('', [CitaController::class, 'index'])->name('cita.index')->middleware('permission:cita.create|cita.show|cita.edit|cita.destroy');
Route::post('delete/{id}', [CitaController::class,'delete'])->name('cita.delete')->middleware('permission:cita.delete');
Route::post('get/{id_cita}', [CitaController::class, 'get'])->name('cita.get')->middleware('permission:cita.show');
Route::post('actualizar/{id_cita}', [CitaController::class, 'update'])->name('cita.update')->middleware('permission:cita.edit|cita.show');
Route::post('month', [CitaController::class,'Get_Month'])->name('cita.month')->middleware('permission:cita.create|cita.show|cita.edit|cita.destroy');
Route::post('update_day', [CitaController::class,'Update_Day'])->name('cita.update_day')->middleware('permission:cita.create|cita.show|cita.edit|cita.destroy');
Route::post('show/{id_user}', [CitaController::class, 'show'])->name('cita.show')->middleware('permission:cita.show');


