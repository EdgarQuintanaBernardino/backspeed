<?php
namespace App\Repositories\Cita;
use App\Repositories\Cita\CitaInterface as CitaInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Cita;
use Illuminate\Support\Facades\Crypt;
use App\Repositories\Cita\CitaCacheRepositories;
use App\Events\layouts\ActividadesRegistradas;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;


//correo de cita
use App\Mail\ConfirCitaMail;
use Illuminate\Support\Facades\Mail;

class CitaRepositories implements CitaInterface{
  protected $citaCacheRepo;
  public function __construct(CitaCacheRepositories $citaCacheRepositories) {
    $this->citaCacheRepo = $citaCacheRepositories;
  }  

  public function get( $sorter, $tableFilter, $columnFilter, $itemsLimit ){

    $db=DB::table('citas')
    ->where('citas.fecha','>',Carbon::now())
    ->whereNull('citas.deleted_at')
    ->join('users','users.id','citas.user_id')
    ->join('status','status.id','citas.status_id')
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

//Registrar datos de cita
  public function store($request) {
    $cita = new Cita();
    $cita->fecha=$request->fecha;
    $cita->nom_cita=$request->nombre;
    $cita->hora=$request->hora;
    $cita->nota=$request->nota;
    $cita->plac_vehiculo=$request->vehiculo;
    $cita->opc_domi=$request->opc_domi;
    $cita->calle=$request->calle;
    $cita->num=$request->num;
    $cita->cp=$request->cp; 
    $cita->colonia=$request->colonia;

    $cita->nom_chofer=$request->nom_chofer;
    $cita->user_id=$request->cliente; 
    $cita->correo=$request->correo;
    $cita->status_id=2; 
    $cita->concretado=$request->concretado;
    $cita->save();

   // return $cita;
   

    $data=['cliente'=>$request->cliente,'asunto'=>$request->nombre,'vehiculo'=>$request->vehiculo,
    'fecha'=>$request->fecha,'hora'=>$request->hora,'calle'=>$request->calle,
    'num'=>$request->num,'cp'=>$request->cp,'colonia'=>$request->colonia,
    'nom_chofer'=>$request->nom_chofer];
    

  
   Mail::to($request->correo)->send(new ConfirCitaMail($data));
  }
//Actualizar datos de una Cita
public function update($request, $id_cita) {
  $cita          = $this->citaCacheRepo->getFindOrFailCache($id_cita);
 $cita->fecha     = $request->fecha;
  $cita->nom_cita    = $request->nom_cita;
  $cita->hora  = $request->hora;
  $cita->nota  = $request->nota;
  $cita->plac_vehiculo = $request->plac_vehiculo;
  $cita->opc_domi=$request->opc_domi;
  $cita->calle=$request->calle;
  $cita->num=$request->num;
  $cita->cp=$request->cp;
  $cita->colonia=$request->colonia;
  $cita->nom_chofer=$request->nom_chofer;
  //$cita->user_id=$request->cliente; 



  if($cita->isDirty()) {
    $info = (object) [
      'modulo'=>'Cita', 'modelo'=>'App\Models\Cita', 'ruta'=>'Edit Cita', 'permisos'=>'cita.show,cita.edit', 'request'=>$cita,
      'campos'  => [
                      ['fecha','Fecha'],
                      ['nom_cita','Nombre Cita'],
                      ['hora','Hora'],
                      ['nota','Nota'],
                      ['plac_vehiculo','Placa'],
                      ['opc_domi','Opcion'],
                      ['calle','Calle'],
                      ['num','Numero'],
                      ['cp','Codigo Postal'],
                      ['colonia','Colonia'],
                      ['nom_chofer','Nombre Chofer'],
                    
                    ]];
    //Dispara el evento registrado en App\Providers\EventServiceProvider.php  
    ActividadesRegistradas::dispatch($info); 
  }
  $cita->save();

  return $cita;
}

public function getFindOrFail($id_cita,$relaciones) {
  return Cita::with($relaciones)->findOrFail($id_cita);

} 
}


