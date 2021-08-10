<?php
use App\Http\Controllers\Diagnostico\DiagnosticoController;

Route::post('almacenar',  [DiagnosticoController::class, 'store'])->name('diagnostico.store')->middleware('permission:diagnostico.store');