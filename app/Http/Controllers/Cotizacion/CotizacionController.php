<?php
namespace App\Http\Controllers\Cotizacion;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Repositories
use App\Repositories\Cotizacion\CotizacionRepositories;

class CotizacionController extends Controller {
//Constructor para traer a nuestro repositorio
  protected $cotizacionRepo;
  public function __construct(CotizacionRepositories $cotizacionRepositories){
    $this->cotizacionRepo= $cotizacionRepositories;
    
  }

//Mandar datos en una tabla filtrada

  public function index(Request $request) {
    $sorter         = $request->input('sorter');
    $tableFilter    = $request->input('tableFilter');
    $columnFilter   = $request->input('columnFilter');
    $itemsLimit     = $request->input('itemsLimit');
    $cotizacion = $this->cotizacionRepo->get($sorter, $tableFilter, $columnFilter, $itemsLimit);
    return response()->json($cotizacion,200);
  }

  public function get($id)
  {


      $todos = DB::table('cotizacion')
     ->rightjoin('users','cotizacion.id','=','users.id')
      ->leftjoin('vehiculos','cotizacion.id','=','vehiculos.id')
      ->select('users.name','users.apell','users.email','users.tel_mov','vehiculos.marc','vehiculos.mod','vehiculos.plac','cotizacion.id')
      ->where('cotizacion.id', '=', $id)
      ->first();

      return response()->json($todos);

    
     
    
  }


  public function store(Request $request) {
    $cotizacion = $this->cotizacionRepo->store($request);
    
     return response()->json([$cotizacion],200);
  }
}