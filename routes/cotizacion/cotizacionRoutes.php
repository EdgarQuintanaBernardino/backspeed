<?php
use App\Http\Controllers\Cotizacion\CotizacionController;

Route::post('', [CotizacionController::class,'index'])->name('cotizacion.index')->middleware('permission:cotizacion.create|cotizacion.show|cotizacion.edit|cotizacion.destroy');
Route::post('get/{id_cot}', [CotizacionController::class,'get'])->name('cotizacion.get')->middleware('permission:cotizacion.get');
Route::post('almacenar',[CotizacionController::class, 'store'])->name('cotizacion.store')->middleware('permission:cotizacion.store');
