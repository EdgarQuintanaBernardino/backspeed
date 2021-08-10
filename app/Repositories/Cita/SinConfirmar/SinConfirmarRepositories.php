<?php
namespace App\Repositories\Cita\SinConfirmar;
use App\Repositories\Cita\SinConfirmar\SinConfirmarInterface as SinConfirmarInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Cita;
use App\Events\layouts\ActividadesRegistradas;
use Illuminate\Support\Facades\Cache;

class SinConfirmarRepositories implements SinConfirmarInterface{

  public function get( $sorter, $tableFilter, $columnFilter, $itemsLimit ){

    $db=DB::table('citas')
    ->whereNull('citas.deleted_at')
    ->join('users','users.id','citas.user_id')
    ->join('status','status.id','citas.status_id')
    ->where('status.name','=','Sin Confirmar')
    ->select('citas.id as id_cita','citas.fecha','citas.nom_cita as nombre_cita','citas.plac_vehiculo as vehiculo','citas.concretado','users.id as id_cliente','users.name as cliente','status.name as status');
    
    if( isset($columnFilter['id_cita']) ){
      $db->where('citas.id', 'like', '%' . $columnFilter['id_cita'] . '%');
    }
    if( isset($columnFilter['fecha']) ){
          $db->where('citas.fecha', 'like', '%' . $columnFilter['fecha'] . '%');
    }
    if( isset($columnFilter['nombre_cita']) ){
          $db->where('citas.nom_cita', 'like', '%' . $columnFilter['nombre_cita'] . '%');
    }
    if( isset($columnFilter['vehiculo']) ){
        $db->where('citas.plac_vehiculo', 'like', '%' . $columnFilter['vehiculo'] . '%');
    }
    if( isset($columnFilter['concretado']) ){
      $db->where('citas.concretado', 'like', '%' . $columnFilter['concretado'] . '%');
  }
    if( isset($columnFilter['id_cliente']) ){
        $db->where('users.id', 'like', '%' . $columnFilter['id_cliente'] . '%');
    }
    if( isset($columnFilter['cliente']) ){
      $db->where('users.name', 'like', '%' . $columnFilter['cliente'] . '%');
  }
  //status.name
  if( isset($columnFilter['status']) ){
    $db->where('status.name', 'like', '%' . $columnFilter['status'] . '%');
}
      
    if( strlen($tableFilter) > 0 ){
      $db->where(function ($query) use ($tableFilter) {
        $query->where('citas.id', 'like',                 '%' . $tableFilter . '%')
        ->orWhere('citas.fecha', 'like',              '%' . $tableFilter . '%')
            ->orWhere('citas.nom_cita', 'like',              '%' . $tableFilter . '%')
            ->orWhere('citas.plac_vehiculo', 'like',              '%' . $tableFilter . '%')  
            ->orWhere('citas.concretado', 'like',              '%' . $tableFilter . '%')  
            ->orWhere('users.id', 'like',              '%' . $tableFilter . '%')
            ->orWhere('users.name', 'like',              '%' . $tableFilter . '%')
            ->orWhere('status.name', 'like',              '%' . $tableFilter . '%');                         
      });
    }
    if( !empty($sorter) ){
      if($sorter['asc'] === false){
          $sortCase = 'desc';
      }else{
          $sortCase = 'asc';
      }
      switch($sorter['column']){
      case 'id_cita':
        $db->orderBy('citas.id',$sortCase);
      break;
      case 'fecha':
          $db->orderBy('citas.fecha',$sortCase);
      break;
      case 'nombre_cita':
              $db->orderBy('citas.nom_cita',$sortCase);
      break;
      case 'vehiculo':
          $db->orderBy('citas.plac_vehiculo',$sortCase);
      break;
      case 'concretado':
        $db->orderBy('citas.concretado',$sortCase);
    break;
      case 'id_cliente':
            $db->orderBy('users.id',$sortCase);
      break;
      case 'cliente':
          $db->orderBy('users.name',$sortCase);
      break;
      case 'status':
        $db->orderBy('status.name',$sortCase);
    break;
            
      }
    }
    return $db->paginate($itemsLimit);
      }
}