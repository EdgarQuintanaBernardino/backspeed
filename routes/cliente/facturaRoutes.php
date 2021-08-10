<?php
use App\Http\Controllers\Cliente\FacturaController;

Route::post('almacenar',[FacturaController::class, 'store'])->name('factura.create');
Route::post('getAll', [FacturaController::class, 'getAllCache'])->name('factura.getAllCache');
Route::post('get/{id_factura}', [FacturaController::class, 'get'])->name('factura.get')->middleware('permission:factura.show');
Route::post('actualizar/{id_factura}', [FacturaController::class, 'update'])->name('factura.update')->middleware('permission:factura.edit|factura.show');
Route::post('show/{id}', [FacturaController::class, 'show'])->name('factura.show')->middleware('permission:factura.show');