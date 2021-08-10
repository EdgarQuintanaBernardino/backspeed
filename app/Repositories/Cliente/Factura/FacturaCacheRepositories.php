<?php
namespace App\Repositories\Cliente\Factura;
// Models
use App\Models\Factura;
// Otros
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Repositories\Cliente\Factura\FacturaCacheInterface as FacturaCacheInterface ;

class FacturaCacheRepositories implements FacturaCacheInterface {
  public function getFindOrFailCache($id) {
    $factura = Cache::rememberForever('facturacion-'.$id, function()use($id){
      return Factura::findOrFail($id);
    });
    return $factura;
  }
}