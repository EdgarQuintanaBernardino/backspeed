<?php
namespace App\Repositories\Vehiculo;
interface VehiculoInterface {
  public function store($request);
  //Trae todos los datos del vehiculo registrado en el multiselect
  public function getAllCache();

  public function getFindOrFail($id_vehiculo,$relaciones);
  public function update($request,$id_vehiculo);
  public function get($sorter, $tableFilter, $columnFilter, $itemsLimit);

 
}