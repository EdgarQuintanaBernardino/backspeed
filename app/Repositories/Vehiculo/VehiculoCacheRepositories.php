<?php
namespace App\Repositories\Vehiculo;
// Models
use App\Models\Vehiculo;
// Otros
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Repositories\Vehiculo\VehiculoCacheInterface as VehiculoCacheInterface ;

class VehiculoCacheRepositories implements VehiculoCacheInterface {
  public function getFindOrFailCache($id_vehiculo) {
    $vehiculo = Cache::rememberForever('vehiculos-'.$id_vehiculo, function() use($id_vehiculo){
      return Vehiculo::findOrFail($id_vehiculo);
    });
    return $vehiculo;
  }
}