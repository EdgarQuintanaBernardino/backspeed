<?php
use App\Http\Controllers\Encuesta\EncuestaController;

Route::post('almacenar',  [EncuestaController::class, 'store'])->name('encuesta.store')->middleware('permission:encuesta.store');