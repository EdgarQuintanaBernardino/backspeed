<?php
use App\Http\Controllers\Cotizacion\ManoObraController;

Route::post('', [ManoObraController::class, 'index'])->name('m_obra.index')->middleware('permission:m_obra.create|m_obra.show|m_obra.edit|m_obra.destroy');
Route::post('almacenar',[ManoObraController::class, 'store'])->name('m_obra.create');
Route::post('delete/{id}', [ManoObraController::class,'delete'])->name('m_obra.delete')->middleware('permission:m_obra.delete');
Route::post('get/{id}', [ManoObraController::class, 'get'])->name('m_obra.get')->middleware('permission:m_obra.show');
Route::post('actualizar/{id}', [ManoObraController::class, 'update'])->name('m_obra.update')->middleware('permission:m_obra.edit|m_obra.show');
