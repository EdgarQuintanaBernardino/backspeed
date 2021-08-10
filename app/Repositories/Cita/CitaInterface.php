<?php
namespace App\Repositories\Cita;

interface CitaInterface {
  public function store($request);
  public function get($sorter, $tableFilter, $columnFilter, $itemsLimit);
  public function getFindOrFail($id_cita, $relaciones);
  public function update($request, $id_cita);

  
}