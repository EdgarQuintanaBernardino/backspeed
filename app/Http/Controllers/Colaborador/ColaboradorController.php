<?php
namespace App\Http\Controllers\Colaborador;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Colaborador\StoreColaboradorRequest;
use App\Repositories\Colaborador\ColaboradorRepositories;

class ColaboradorController extends Controller
{
    //Constructor para traer a nuestro repositorio

    protected $colaboradorRepo;
    public function __construct(ColaboradorRepositories $colaboradorRepositories) {
      $this->colaboradorRepo   = $colaboradorRepositories;
     
    }

    public function index(Request $request)
      {
          $sorter         = $request->input('sorter');
          $tableFilter    = $request->input('tableFilter');
          $columnFilter   = $request->input('columnFilter');
          $itemsLimit     = $request->input('itemsLimit');
          $colaborador = $this->colaboradorRepo->get( $sorter,$tableFilter,$columnFilter,$itemsLimit);
          return response()->json( $colaborador);
      }



    public function store(StoreColaboradorRequest $request) {
        $colaborador= $this->colaboradorRepo ->store($request);
        return response()->json([$colaborador->id],200);
      }

    //Trae datos del cliente para nuestro multiselect 
   
     public function getAllCache(){
        $colaborador=$this->colaboradorRepo->getAllCache();
        return response()->json($colaborador,200);
      }
}