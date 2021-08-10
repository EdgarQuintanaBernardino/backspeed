<?php
use App\Http\Controllers\Colaborador\ColaboradorController;

Route::post('almacenar',[ColaboradorController::class, 'store'])->name('colaborador.create');
Route::post('', [ColaboradorController::class, 'index'])->name('colaborador.index')->middleware('permission:colaborador.create|colaborador.show|colaborador.edit|colaborador.destroy');
Route::post('getAll', [ColaboradorController::class, 'getAllCache'])->name('colaborador.getAll');
