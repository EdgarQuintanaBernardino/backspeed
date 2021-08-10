<?php
namespace App\Repositories\Cliente\Credito;
// Models
use App\Models\Credito;
// Otros
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Repositories\Cliente\Credito\CreditoCacheInterface as CreditoCacheInterface ;

class CreditoCacheRepositories implements CreditoCacheInterface {
  public function getFindOrFailCache($id_credito) {
    $credito = Cache::rememberForever('credito-'.$id_credito, function() use($id_credito){
      return Credito::findOrFail($id_credito);
    });
    return $credito;
  }
}
