<?php
use App\Http\Controllers\UsersController;
Route::post('getAll', [UsersController::class, 'getAllCache'])->name('users.getAllCache');
Route::post('delete/{id}', [UsersController::class, 'delete'])->name('user.delete')->middleware('permission:user.delete');;
Route::post('get/{id_sucursal}', [UsersController::class, 'edit'])->name('sucursal.get')->middleware('permission:user.show|user.edit');
Route::post('actualizar/{id_sucursal}', [UsersController::class, 'update'])->name('sucursal.update')->middleware('permission:user.edit');