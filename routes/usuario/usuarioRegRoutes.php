<?php
use App\Http\Controllers\UsersController;

Route::post('get/{id}', [UsersController::class, 'edit'])->name('user.get')->middleware('permission:user.show|user.edit');
