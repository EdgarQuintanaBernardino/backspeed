<?php
namespace App\Repositories\Cita\SinConfirmar;

interface SinConfirmarInterface {
  public function get($sorter, $tableFilter, $columnFilter, $itemsLimit);
}