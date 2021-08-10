<?php
use App\Http\Controllers\RolesController;
Route::post('getAll', [RolesController::class, 'getAll'])->name('rol.getAll');
Route::post('delete/{id}', [RolesController::class, 'delete'])->name('rol.delete');//->middleware('permission:rol.delete');;
//Route::post('get/{id_sucursal}', [RolesController::class, 'edit'])->name('rol.get')->middleware('permission:rol.show|rol.edit');
//Route::post('actualizar/{id_sucursal}', [RolesController::class, 'update'])->name('rol.update')->middleware('permission:rol.edit');
Route::post('almacenar',  [RolesController::class, 'store'])->name('rol.create')->middleware('permission:rol.create');

