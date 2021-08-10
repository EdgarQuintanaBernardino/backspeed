<?php
namespace App\Repositories\Cliente\General;
interface GeneralInterface {
 // public function get($sorter, $tableFilter, $columnFilter, $itemsLimit);
  public function store($request);
  public function getFindOrFail($id_user,$relaciones);
  public function update($request, $id_user);
  public function get($sorter, $tableFilter, $columnFilter, $itemsLimit);
  public function getAllCache();
}