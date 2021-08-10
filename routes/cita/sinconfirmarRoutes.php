<?php
use App\Http\Controllers\Cita\SinConfirmarController;

Route::post('', [SinConfirmarController::class, 'index'])->name('sinconfirmar.index')->middleware('permission:sinconfirmar.create|sinconfirmar.edit|sinconfirmar.destroy');