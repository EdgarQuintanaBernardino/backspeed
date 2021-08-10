<?php
namespace App\Repositories\ClienteVehiculo;

interface ClienteVehiculoInterface {
  public function get($sorter, $tableFilter, $columnFilter, $itemsLimit);
 


}