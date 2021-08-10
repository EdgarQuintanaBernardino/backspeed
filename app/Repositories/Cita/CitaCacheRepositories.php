<?php
namespace App\Repositories\Cita;
// Models
use App\Models\Cita;
// Otros
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Repositories\Cita\CitaCacheInterface as CitaCacheInterface ;

class CitaCacheRepositories implements CitaCacheInterface {
  public function getFindOrFailCache($id_cita) {
    $cita = Cache::rememberForever('citas-'.$id_cita, function() use($id_cita){
      return Cita::findOrFail($id_cita);
    });
    return $cita;
  }
}
