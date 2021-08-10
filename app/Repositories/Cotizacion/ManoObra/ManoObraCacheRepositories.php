<?php
namespace App\Repositories\Cotizacion\ManoObra;
// Models
use App\Models\ManoObra;
// Otros
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Repositories\Cotizacion\ManoObra\ManoObraCacheInterface;

class ManoObraCacheRepositories implements ManoObraCacheInterface {
 public function getFindOrFailCache($id) {
    $m_obra = Cache::rememberForever('mano_obras-'.$id, function() use($id){
      return ManoObra::findOrFail($id);
    });
    
    return $m_obra;
  }
}

 