<?php
use App\Http\Controllers\Cliente\CreditoController;

Route::post('almacenar',[CreditoController::class, 'store'])->name('credito.create');
Route::post('actualizar/{id_credito}', [CreditoController::class, 'update'])->name('credito.update')->middleware('permission:credito.edit|credito.show');
