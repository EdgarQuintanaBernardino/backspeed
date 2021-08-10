<?php
use App\Http\Controllers\Cita\ConfirmadaController;

Route::post('', [ConfirmadaController::class, 'index'])->name('confirmada.index')->middleware('permission:confirmada.create|confirmada.edit|confirmada.destroy');