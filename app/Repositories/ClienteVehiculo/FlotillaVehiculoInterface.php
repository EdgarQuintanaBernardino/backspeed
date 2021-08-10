<?php
namespace App\Repositories\ClienteVehiculo;

interface FlotillaVehiculoInterface {
  public function get($sorter, $tableFilter, $columnFilter, $itemsLimit);
 


}