<?php
use App\Http\Controllers\ClienteVehiculo\TodosController;
Route::post('', [TodosController::class, 'index'])->name('todos.index')->middleware('permission:todos.create|todos.show|todos.edit|todos.destroy');;