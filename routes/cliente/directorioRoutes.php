<?php
use App\Http\Controllers\Cliente\DirectorioController;

//Route::post('directorio', 'DirectorioController@index')->name('directorio.index');
Route::post('', [DirectorioController::class, 'index'])->name('directorio.index');
Route::post('almacenar',[DirectorioController::class, 'store'])->name('directorio.create');
Route::post('eliminar',[DirectorioController::class, 'destroy'])->name('directorio.destroy');