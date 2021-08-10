<?php
namespace App\Http\Controllers\Cliente;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;
use App\Http\Requests\Cliente\Factura\StoreFacturaRequest;
use App\Http\Requests\Cliente\Generales\UpdateGeneralRequest; 
// Repositories
use App\Repositories\Cliente\Factura\FacturaRepositories;
use App\Repositories\Cliente\Factura\FacturaCacheRepositories;
use Illuminate\Support\Facades\DB;
class FacturaController extends Controller {
//Constructor para traer a nuestro repositorio
  protected $facturaRepo;
  protected $facturaCacheRepo;
  public function __construct(FacturaRepositories $facturaRepositories,FacturaCacheRepositories $facturaCacheRepositories) {
    $this->facturaRepo    = $facturaRepositories;
    $this->facturaCacheRepo =$facturaCacheRepositories;
  }
//Realiza el registro de una nueva factura 
  public function store(Request $request) {
    $factura = $this->facturaRepo->store($request);
    return response()->json(['id'=>$factura->id],200);
  }  
//Trae todos los datos de facturacion 
  public function get($id) {
    $factura = $this->facturaCacheRepo->getFindOrFailCache($id);
    return response()->json($factura,200);
  }

  public function show($id)
  {
    $todos = DB::table('users')
    ->rightjoin('facturacion','users.id','=','facturacion.user_id')
    ->where('users.id','=',$id)

    ->first();
    return response()->json($todos);
} 
/* Actualizar los datos de Facturacion */
public function update(Request $request,$id) {
  //return($request);
  $factura = $this->facturaRepo->update($request,$id);
  return response()->json(['id'=>$factura->id],200);
  }


  public function getAllCache(){
    $factura=$this->facturaRepo->getAllCache();
    return response()->json($factura);
  }

}

