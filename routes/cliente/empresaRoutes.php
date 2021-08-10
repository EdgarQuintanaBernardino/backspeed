<?php
use App\Http\Controllers\Cliente\EmpresaController;
Route::post('getAll', [EmpresaController::class, 'getAllCache'])->name('empresa.getAllCache');