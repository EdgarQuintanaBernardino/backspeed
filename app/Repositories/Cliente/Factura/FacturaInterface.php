<?php
namespace App\Repositories\Cliente\Factura;
interface FacturaInterface {
  public function store($request);
  public function getFindOrFail($id, $relaciones);
  public function update($request, $id);
  public function getAllCache();
}




































