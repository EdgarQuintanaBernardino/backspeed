<?php
namespace App\Repositories\Vehiculo;

interface VehiculoCacheInterface{  
  public function getFindOrFailCache($request);

}