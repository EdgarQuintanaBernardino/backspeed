<?php
use App\Http\Controllers\Recepcion\RecepcionController;

Route::post('almacenar',  [RecepcionController::class, 'store'])->name('recepcion.create')->middleware('permission:recepcion.create');
