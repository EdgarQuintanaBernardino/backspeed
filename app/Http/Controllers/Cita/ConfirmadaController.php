<?php
namespace App\Http\Controllers\Cita;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;

// Repositories
use App\Repositories\Cita\Confirmada\CitaConfirmadaRepositories;
use App\Models\Cita;
use App\Http\Requests\Cita\StoreCitaRequest;
use App\Http\Requests\Cita\UpdateCitaRequest;
use Illuminate\Support\Facades\DB;
class ConfirmadaController extends Controller {
  protected $confirRepo;
  public function __construct(CitaConfirmadaRepositories $citaconfirmadaRepositories) {
    $this->confirRepo    = $citaconfirmadaRepositories;
  }

  //Mandar datos en una tabla filtrada
  public function index(Request $request) {
    $sorter         = $request->input('sorter');
    $tableFilter    = $request->input('tableFilter');
    $columnFilter   = $request->input('columnFilter');
    $itemsLimit     = $request->input('itemsLimit');
    $Cita = $this->confirRepo->get($sorter, $tableFilter, $columnFilter, $itemsLimit);
    return response()->json($Cita,200);
  }



}