<?php
namespace App\Http\Controllers\Cliente;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;
use App\Http\Requests\Cliente\Directorio\StoreDirectorioRequest;
// Repositories
use App\Repositories\Cliente\Directorio\DirectorioRepositories;
//Models
use App\Models\Directorio;
class DirectorioController extends Controller {
//Realizar un constructor para traer los metodos en el repositorio
  protected $DirectorioRepo;
  public function __construct(DirectorioRepositories $DirectorioRepositories) {
    $this->DirectorioRepo    = $DirectorioRepositories;
  }
//Mostrar directorios del cliente de manera filtrada
  public function index(Request $request)
  {
          $sorter         = $request->input('sorter');
          $tableFilter    = $request->input('tableFilter');
          $columnFilter   = $request->input('columnFilter');
          $itemsLimit     = $request->input('itemsLimit');
    
          $directorio= $this->DirectorioRepo->get($sorter, $tableFilter, $columnFilter, $itemsLimit);
          return response()->json($directorio);
        
  }
//Agregar un nuevo directorio del cliente
  public function store(StoreDirectorioRequest $request) {
    $directorio = $this->DirectorioRepo->store($request);
    return response()->json(['id'=>$directorio->id],200);    
  }
//Eliminar un directorio
  public function destroy($id)
  {
      $directorio = Directorio::find($id);
      if($directorio){
      $directorio->delete();
      }
      return response()->json( ['status' => 'success'] );
  } 
}