<?php
namespace App\Repositories\Cita\CitaPasada;

interface CitaPasadaInterface {
  public function get($sorter, $tableFilter, $columnFilter, $itemsLimit); 
}