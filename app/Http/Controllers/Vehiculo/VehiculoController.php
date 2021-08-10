<?php
namespace App\Http\Controllers\Vehiculo;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;
use App\Http\Requests\Vehiculo\StoreVehiculoRequest;
use App\Http\Requests\Vehiculo\UpdateVehiculoRequest; 
// Repositories
use App\Repositories\Vehiculo\VehiculoRepositories;
use App\Http\Controllers\Cliente\GeneralController;
//Modelos
use App\Models\Vehiculo;
use App\Models\Users;
//Base de Datos
use Illuminate\Support\Facades\DB;

class VehiculoController extends Controller {
  //Constructor para traer a nuestro repositorio
  protected $VehiculoRepo;
  protected $controlUser;
  public function __construct(VehiculoRepositories $VehiculoRepositories,GeneralController $GeneralController) {
    $this->VehiculoRepo=$VehiculoRepositories;
    $this->controlUser=$GeneralController;
  }
//Mandar datos en una tabla filtrada
public function index(Request $request) {
  $sorter         = $request->input('sorter');
  $tableFilter    = $request->input('tableFilter');
  $columnFilter   = $request->input('columnFilter');
  $itemsLimit     = $request->input('itemsLimit');
  $vehiculo = $this->VehiculoRepo->get($sorter, $tableFilter, $columnFilter, $itemsLimit);
  return response()->json($vehiculo,200);
}

//Controlador que guarda nuevos datos de Vehiculo 
public function store(StoreVehiculoRequest $request) {
$vehiculos= $this->VehiculoRepo->store($request);
return response()->json([$vehiculos->id],200);
  }
 //Trae datos del cliente para nuestro multiselect 
 public function getAllCache(){
  $vehiculo=$this->VehiculoRepo->getAllCache();
  return response()->json($vehiculo);
  
}

public function get($id)
{
 /*$todos = DB::table('vehiculos')
    ->rightjoin('users','vehiculos.id','=','users.id')
    
    ->where('vehiculos.id', '=', $id)
    ->first();
    return response()->json( $todos);*/


    $todos=DB::table('user_vehiculo')
->join('users','users.id','user_vehiculo.user_id')
->join('vehiculos','vehiculos.id','user_vehiculo.vehiculo_id')

->where('user_vehiculo.vehiculo_id','=',$id)
->first();
    return response()->json( $todos);
}

public function update(UpdateVehiculoRequest  $request, $id_vehiculo) {
  $vehiculo = $this->VehiculoRepo->update($request, $id_vehiculo);
  return response()->json(['id'=>$vehiculo->id],200);
}

 //eliminar un vehiculo 
 public function delete($id){    
     $vehiculo= Vehiculo::find($id);
     $vehiculo->forceDelete(); 
     return response()->json( ['status' => 'success'] );
 }
}