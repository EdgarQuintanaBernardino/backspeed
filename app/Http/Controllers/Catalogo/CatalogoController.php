<?php
namespace App\Http\Controllers\Catalogo;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;
use App\Http\Requests\Catalogo\StoreCatalogoRequest;
// Repositories
use App\Repositories\Catalogo\CatalogoRepositories;
//Models
use App\Models\Catalogo;

class CatalogoController extends Controller {
  protected $catalogoRepo;
  public function __construct(CatalogoRepositories $catalogoRepositories) {
    $this->catalogoRepo = $catalogoRepositories;
  }

  //tabla filtrada
  public function index(Request $request) {
    $sorter         = $request->input('sorter');
    $tableFilter    = $request->input('tableFilter');
    $columnFilter   = $request->input('columnFilter');
    $itemsLimit     = $request->input('itemsLimit');
    $catalogo = $this->catalogoRepo->get($sorter, $tableFilter, $columnFilter, $itemsLimit);
    return response()->json($catalogo,200);
  }

  public function store(Request $request) {
    $catalogo = $this->catalogoRepo->store($request);
    return response()->json([$catalogo], 200);
  }
  public function getAllCache(Request $request) {
    $catalogos = $this->catalogoRepo->getAllCache($request->input);
    return response()->json($catalogos, 200);
  }


  public function delete(Request $request){
    $catalogo=Catalogo::find($request->id);
    $catalogo->delete();
    return response()->json( ['status' => 'success'] );
    }


    public function get($id)
    {
      $catalogo= DB::table('catalogos')
        ->where('id', '=', $id)
        ->first();
        return response()->json( $catalogo);
    }

}