<?php
namespace App\Repositories\Cotizacion\ManoObra;
interface ManoObraInterface {
 public function get($sorter, $tableFilter, $columnFilter, $itemsLimit);
 public function store($request);
 public function update($request,$id);
 public function getFindOrFail($id_user,$relaciones);


}