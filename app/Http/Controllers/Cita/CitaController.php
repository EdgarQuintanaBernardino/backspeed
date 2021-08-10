<?php
namespace App\Http\Controllers\Cita;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;
use Carbon\Carbon;
// Repositories
use App\Repositories\Cita\CitaRepositories;
use App\Models\Cita;
use App\Http\Requests\Cita\StoreCitaRequest;
use App\Http\Requests\Cita\UpdateCitaRequest;
use Illuminate\Support\Facades\DB;
class CitaController extends Controller {
  protected $citaRepo;
  public function __construct(CitaRepositories $citaRepositories) {
    $this->citaRepo    = $citaRepositories;
  }

  //Mandar datos en una tabla filtrada
  public function index(Request $request) {
    $sorter         = $request->input('sorter');
    $tableFilter    = $request->input('tableFilter');
    $columnFilter   = $request->input('columnFilter');
    $itemsLimit     = $request->input('itemsLimit');
    $Cita = $this->citaRepo->get($sorter, $tableFilter, $columnFilter, $itemsLimit);
    return response()->json($Cita,200);
  }
  public function Get_Month(Request $request){
    $citas=Cita::whereYear('fecha',$request->year)->whereMonth('fecha',($request->month+1))->get();
    return response()->json( ['data' =>$citas,'code'=>200] );
  }
  
  public function Update_Day(Request $request){
    $cita=Cita::findorfail($request->id);
    $cita->fecha=$request->date;
    $cita->save();
    return response()->json( ['data' =>$cita,'code'=>200] );
  
  }
//Registra a un cliente nuevo
  public function store(StoreCitaRequest $request) {
    $cita = $this->citaRepo->store($request);
    return response()->json([$cita],200);
    
  }
 //elimina clientes
  public function delete(Request $request){
    $cita= Cita::find($request->id);
    $cita->delete();
    return response()->json( ['status' => 'success'] );
 }

 public function get($id){
  $cita = DB::table('citas')
    //->join('users','users.id','=','citas.user_id')
    ->where('citas.id', '=', $id)
    ->first();
    return response()->json( $cita);
}
//traer citas de un solo cliente
public function show($id){
  $cita = DB::table('citas')
    ->join('users','users.id','=','citas.user_id')
    ->join('status','status.id','=','citas.status_id')
    ->where('users.id', '=', $id)
    ->orWhere('citas.fecha','>',Carbon::today())
    ->first();
    return response()->json( $cita);
}



public function update(UpdateCitaRequest  $request, $id_cita) {
  $cita = $this->citaRepo->update($request, $id_cita);
  return response()->json(['id'=>$cita->id],200);
}


}