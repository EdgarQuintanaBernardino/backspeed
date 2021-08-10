<?php
use App\Http\Controllers\Catalogo\CatalogoController;

Route::post('almacenar',  [CatalogoController::class, 'store'])->name('catalogo.store')->middleware('permission:catalogo.store');
Route::post('getAll', [CatalogoController::class, 'getAllCache'])->name('catalogo.getAllCache')->middleware('permission:sucursal.create|sucursal.edit');
Route::post('', [CatalogoController::class, 'index'])->name('catalogo.index')->middleware('permission:catalogo.create|catalogo.show|catalogo.edit|catalogo.delete');
Route::post('delete/{id}', [CatalogoController::class,'delete'])->name('catalogo.delete')->middleware('permission:catalogo.delete');
