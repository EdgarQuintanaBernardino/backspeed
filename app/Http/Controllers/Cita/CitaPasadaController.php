<?php
namespace App\Http\Controllers\Cita;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;

// Repositories
use App\Repositories\Cita\CitaPasada\CitaPasadaRepositories;
use App\Models\Cita;

use Illuminate\Support\Facades\DB;
class CitaPasadaController extends Controller {
  protected $citapas;
  public function __construct(CitaPasadaRepositories $CitaPasadaRepositories) {
    $this->citapas    = $CitaPasadaRepositories;
  }

  //Mandar datos en una tabla filtrada
  public function index(Request $request) {
    $sorter         = $request->input('sorter');
    $tableFilter    = $request->input('tableFilter');
    $columnFilter   = $request->input('columnFilter');
    $itemsLimit     = $request->input('itemsLimit');
    $Cita = $this->citapas->get($sorter, $tableFilter, $columnFilter, $itemsLimit);
    return response()->json($Cita,200);
  }
 /* public function show($id){
    $Cita = DB::table('citas') 
      ->leftjoin('users','users.id','=','citas.user_id')
      ->rightjoin('status','status.id','=','citas.status_id')
    

     
      ->where('users.id', '=', $id)
      ->first();
      return response()->json($Cita);
  }*/

}