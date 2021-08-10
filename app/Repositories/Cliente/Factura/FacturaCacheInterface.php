<?php
namespace App\Repositories\Cliente\Factura;

interface FacturaCacheInterface{  
  public function getFindOrFailCache($request);

  
}