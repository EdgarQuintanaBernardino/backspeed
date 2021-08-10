<?php
namespace App\Repositories\Cotizacion;
interface CotizacionInterface {
 public function get($sorter, $tableFilter, $columnFilter, $itemsLimit);

}
