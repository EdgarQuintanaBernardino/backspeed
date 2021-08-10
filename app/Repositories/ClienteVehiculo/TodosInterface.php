<?php
namespace App\Repositories\ClienteVehiculo;

interface TodosInterface {
  public function get($sorter, $tableFilter, $columnFilter, $itemsLimit);
 


}