<?php
namespace App\Repositories\Cliente\Directorio;
use App\Repositories\Cliente\Directorio\DirectorioInterface as DirectorioInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Directorio;
use App\Models\User;


class DirectorioRepositories implements DirectorioInterface{
  
    //Traer datos en una tabla filtrada
  public function get( $sorter, $tableFilter, $columnFilter, $itemsLimit ){
        
    $db = DB::table('directorios')->select('nom as nombre','puest as puesto','correo','tel as telefono');       

    if( isset($columnFilter['nombre']) ){
        $db->where('nom', 'like', '%' . $columnFilter['nombre'] . '%');
    }
    if( isset($columnFilter['puesto']) ){
        $db->where('puest', 'like', '%' . $columnFilter['puesto'] . '%');
    }
    if( isset($columnFilter['correo']) ){
      $db->where('correo', 'like', '%' . $columnFilter['correo'] . '%');
  }
  if( isset($columnFilter['telefono']) ){
    $db->where('tel', 'like', '%' . $columnFilter['telefono'] . '%');
}


    if( strlen($tableFilter) > 0 ){
        $db->where(function ($query) use ($tableFilter) {
            $query->where('nom', 'like',                 '%' . $tableFilter . '%')
                  ->orWhere('puest', 'like',              '%' . $tableFilter . '%')
                  ->orWhere('correo', 'like',        '%' . $tableFilter . '%')
                  ->orWhere('tel', 'like',        '%' . $tableFilter . '%');
                  
        });
    }
    if( !empty($sorter) ){
        if($sorter['asc'] === false){
            $sortCase = 'desc';
        }else{
            $sortCase = 'asc';
        }

        switch($sorter['column']){
            case 'nombre':
                $db->orderBy('nom',              $sortCase);
            break;
            case 'puesto':
                $db->orderBy('puest',             $sortCase);
            break;
            case 'correo':
                $db->orderBy('correo',      $sortCase);
            break;
            case 'telefono':
              $db->orderBy('tel',      $sortCase);
          break;
        }
    }

    return $db->paginate($itemsLimit);

}
//Realizar el registro de un nuevo directorio

public function store($request) {
    DB::beginTransaction();
    try {

        $directorio = new Directorio();
        $directorio->nom= $request->nombredir;
        $directorio->puest= $request->puesto;
        $directorio->correo= $request->correodir;
        $directorio->tel= $request->telefono;      
        $directorio->save();   
            
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
   return $directorio;
  }
}
