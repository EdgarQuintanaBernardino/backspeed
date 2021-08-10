<?php
use App\Http\Controllers\Cita\CitaPasadaController;


Route::post('', [CitaPasadaController::class, 'index'])->name('citapasada.index')->middleware('permission:citapasada.create|citapasada.show|citapasada.edit|citapasada.destroy');
Route::post('show/{id}', [CitaPasadaController::class,'show'])->name('citapasada.show')->middleware('permission:citapasada.show');
