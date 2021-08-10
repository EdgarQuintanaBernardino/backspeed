<?php
namespace App\Repositories\ClienteVehiculo;
// Models
use App\Models\User;
// Otros
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TodosRepositories implements TodosInterface{

public function get( $sorter, $tableFilter, $columnFilter, $itemsLimit ){

$db=DB::table('user_vehiculo')
->rightjoin('users','users.id','user_vehiculo.user_id')
->where('users.id','!=',1)
->leftjoin('vehiculos','vehiculos.id','user_vehiculo.vehiculo_id')
->whereNull('users.deleted_at')
->select('users.id as id_cliente','users.name as usuario','users.email','users.apell','users.tel_mov as telefono','users.tip_cliente as Tipo','users.emp as empresa','vehiculos.id as id_vehiculo','vehiculos.plac as placas','vehiculos.vin');
    if( isset($columnFilter['id_cliente']) ){
      $db->where('users.id', 'like', '%' . $columnFilter['id_cliente'] . 
      '%');
  }

  if( isset($columnFilter['usuario']) ){
      $db->where('users.name', 'like', '%' . $columnFilter['usuario'] . '%');
  }
  
  if( isset($columnFilter['email']) ){
    $db->where('users.email', 'like', '%' . $columnFilter['email'] . '%');
}
  if( isset($columnFilter['apell']) ){
    $db->where('users.apell', 'like', '%' . $columnFilter['apell'] . '%');
}
  if( isset($columnFilter['telefono']) ){
    $db->where('users.tel_mov', 'like', '%' . $columnFilter['telefono'] . '%');
}
if( isset($columnFilter['Tipo']) ){
    $db->where('users.tip_cliente', 'like', '%' . $columnFilter['Tipo'] . '%');
  }
if( isset($columnFilter['empresa']) ){
  $db->where('users.emp', 'like', '%' . $columnFilter['empresa'] . '%');
}
if( isset($columnFilter['placas']) ){
  $db->where('vehiculos.plac', 'like', '%' . $columnFilter['placas'] . '%');
}
if( isset($columnFilter['vin']) ){
  $db->where('vehiculos.vin', 'like', '%' . $columnFilter['vin'] . '%');
}
if( strlen($tableFilter) > 0 ){
  $db->where(function ($query) use ($tableFilter) {
      $query->where('users.id', 'like',                 '%' . $tableFilter . '%')
            ->orWhere('users.name', 'like',              '%' . $tableFilter . '%')
            ->orWhere('users.email', 'like',              '%' . $tableFilter . '%')  
            ->orWhere('users.apell', 'like',              '%' . $tableFilter . '%') 
            ->orWhere('users.tel_mov', 'like',              '%' . $tableFilter . '%')
            ->orWhere('users.tip_cliente', 'like',              '%' . $tableFilter . '%')
            ->orWhere('users.emp', 'like',              '%' . $tableFilter . '%')
            //->orWhere('vehiculos.id_vehiculo', 'like',              '%' . $tableFilter . '%')
            ->orWhere('vehiculos.plac', 'like',              '%' . $tableFilter . '%')
            ->orWhere('vehiculos.vin', 'like',              '%' . $tableFilter . '%');                
  });
}

if( !empty($sorter) ){
  if($sorter['asc'] === false){
      $sortCase = 'desc';
  }else{
      $sortCase = 'asc';
  }
  switch($sorter['column']){
    case 'id_cliente':
      $db->orderBy('users.id',$sortCase);
    break;
    case 'usuario':
          $db->orderBy('users.name',$sortCase);
    break;
    case 'email':
      $db->orderBy('users.email',$sortCase);
break;
    case 'apell':
      $db->orderBy('users.apell',$sortCase);
break;
    case 'telefono':
        $db->orderBy('users.tel_mov',$sortCase);
    break;
    case 'Tipo':
        $db->orderBy('users.tip_cliente',$sortCase);
    break;
    case 'empresa':
      $db->orderBy('users.emp',$sortCase);
  break;
    case 'placas':
      $db->orderBy('vehiculos.plac',$sortCase);
    break;
    case 'vin':
    $db->orderBy('vehiculos.vin',$sortCase);
    break;
      
  }      
}

return $db->paginate($itemsLimit);

  }

}