<?php
namespace App\Repositories\Cita\Confirmada;

interface CitaConfirmadaInterface {

  public function get($sorter, $tableFilter, $columnFilter, $itemsLimit);
  
}