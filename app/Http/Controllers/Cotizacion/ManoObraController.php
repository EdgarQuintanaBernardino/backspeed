<?php
namespace App\Http\Controllers\Cotizacion;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;
use App\Http\Requests\ManoObra\StoreManoObraRequest;
use App\Http\Requests\ManoObra\UpdateManoObraRequest;
use Illuminate\Support\Facades\DB;


// Repositories
use App\Repositories\Cotizacion\ManoObra\ManoObraRepositories;
//Models
use App\Models\ManoObra;

class ManoObraController extends Controller {
//Constructor para traer a nuestro repositorio
  protected $obraRepo;
  public function __construct(ManoObraRepositories $manoobraRepositories){
    $this->obraRepo= $manoobraRepositories;
    
  }

//Mandar datos en una tabla filtrada

  public function index(Request $request) {
    $sorter         = $request->input('sorter');
    $tableFilter    = $request->input('tableFilter');
    $columnFilter   = $request->input('columnFilter');
    $itemsLimit     = $request->input('itemsLimit');
    $mano_obra = $this->obraRepo->get($sorter, $tableFilter, $columnFilter, $itemsLimit);
    return response()->json($mano_obra,200);
    
  }

  
  public function store(StoreManoObraRequest $request) {
    $mano_obra= $this->obraRepo ->store($request);
    return response()->json([$mano_obra->id],200);
  }
  public function delete(Request $request){
    $mano_obra= ManoObra::find($request->id);
    $mano_obra->delete();
    return response()->json( ['status' => 'success'] );
 }

 public function get($id)
{
  $m_obra = DB::table('mano_obras')
    ->where('id', '=', $id)
    ->first();
    return response()->json( $m_obra);
}

public function update(UpdateManoObraRequest  $request, $id) {
  $m_obra = $this->obraRepo->update($request, $id);
  return response()->json(['id'=>$m_obra->id],200);
}

}