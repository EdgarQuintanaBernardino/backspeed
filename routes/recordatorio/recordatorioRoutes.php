<?php
use App\Http\Controllers\Recordatorio\RecordatorioController;

Route::post('almacenar',  [RecordatorioController::class, 'store'])->name('recordatorio.store')->middleware('permission:recordatorio.store');