<?php
namespace App\Http\Controllers\Cliente;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;
use App\Http\Requests\Cliente\Generales\StoreGeneralRequest;
use App\Http\Requests\Cliente\Generales\UpdateGeneralRequest; 
// Repositories
use App\Repositories\Cliente\General\GeneralRepositories;
use App\Repositories\Cliente\Directorio\DirectorioRepositories;
use App\Repositories\Cliente\Factura\FacturaRepositories;
use App\Repositories\Cliente\Credito\CreditoRepositories;
use App\Repositories\Cliente\General\GeneralCacheRepositories;

use Illuminate\Support\Facades\DB;

use App\Models\User;
class GeneralController extends Controller {
//Constructor para traer a nuestro repositorio
  protected $GeneralRepo;
  protected $dirRepo;
  protected $facRepo;
  protected $creditRepo;
  protected $generalCacheRepo;
  public function __construct(GeneralRepositories $GeneralRepositories,DirectorioRepositories $DirectorioRepositories,FacturaRepositories $FacturaRepositories,CreditoRepositories $CreditoRepositories,GeneralCacheRepositories $generalCacheRepositories){
    $this->GeneralRepo = $GeneralRepositories;
   /* $this->dirRepo    = $DirectorioRepositories;
    $this->facRepo    = $FacturaRepositories;
    $this->creditRepo = $CreditoRepositories;*/
    $this->generalCacheRepo =$generalCacheRepositories;
  }

//Registra a un cliente nuevo
public function store(Request $request) {
 // return $request;
 $generales = $this->GeneralRepo->store($request);
 /*$generales= $this->dirRepo->store($request);
 $generales= $this->facRepo->store($request);
  $generales= $this->creditRepo->store($request);*/ 

  
  return response()->json([$generales],200);  
  }



//tabla filtrada
  public function index(Request $request) {
    $sorter         = $request->input('sorter');
    $tableFilter    = $request->input('tableFilter');
    $columnFilter   = $request->input('columnFilter');
    $itemsLimit     = $request->input('itemsLimit');
    $general = $this->GeneralRepo->get($sorter, $tableFilter, $columnFilter, $itemsLimit);
    return response()->json($general,200);
  }

  /*
  public function get($id_user) {
    $general = $this->generalCacheRepo->getFindOrFailCache($id_user);
    return response()->json($general,200);
  }*/
     /*  $users = DB::table('users')
         ->where('users.id', '=', $id)
         ->first();
         return response()->json( $users );
         $factura = DB::table('facturacion')
         ->join('users','users.id','=','facturacion.user_id')
        // ->join('credito','credito.id','=','credito.user_id')
         ->where('users.id', '=', $id)
         ->first();
         return response()->json( $factura );
 } */
//Actualizar datos generales del cliente
  public function update(UpdateGeneralRequest  $request, $id_user) {
    $general = $this->GeneralRepo->update($request, $id_user);
    return response()->json(['id'=>$general->id],200);
  }
/* Detalles generales del cliente*/

  public function get($id){

      $todos = DB::table('users')
      ->rightjoin('facturacion','users.id','=','facturacion.user_id')
      ->leftjoin('credito','users.id','=','credito.user_id')
      ->where('users.id','=',$id)
   
      ->first();
      return response()->json( $todos);
    
   


}

//detalles de un usuario con vehiculo

public function show($id){
 // $todos = DB::table('users')
  //  ->leftjoin('vehiculos','users.id','=','vehiculos.id')

   // ->leftjoin('credito','users.id','=','credito.user_id')
   $todos = DB::table('user_vehiculo')
   ->leftjoin('vehiculos','vehiculos.id','user_vehiculo.vehiculo_id')
   ->rightjoin('users','users.id','user_vehiculo.user_id')
   ->select('users.id','vehiculos.id','vehiculos.marc','vehiculos.mod','vehiculos.plac','vehiculos.año')

    ->where('users.id', '=', $id)
    //->orWhere('facturacion.id','=',$id)
    ->first();
    return response()->json( $todos);
}

/* trae todos los datos del registro del cliente */
public function getAllCache(){
  $generales=$this->GeneralRepo->getAllCache();
  return response()->json($generales);
}
}


