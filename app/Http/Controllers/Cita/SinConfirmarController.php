<?php
namespace App\Http\Controllers\Cita;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;

// Repositories
use App\Repositories\Cita\SinConfirmar\SinConfirmarRepositories;
use App\Models\Cita;
use App\Http\Requests\Cita\StoreCitaRequest;
use App\Http\Requests\Cita\UpdateCitaRequest;
use Illuminate\Support\Facades\DB;
class SinConfirmarController extends Controller {
  protected $sinconfirRepo;
  public function __construct(SinConfirmarRepositories $sinconfirmarRepositories) {
    $this->sinconfirRepo    = $sinconfirmarRepositories;
  }

  //Mandar datos en una tabla filtrada
  public function index(Request $request) {
    $sorter         = $request->input('sorter');
    $tableFilter    = $request->input('tableFilter');
    $columnFilter   = $request->input('columnFilter');
    $itemsLimit     = $request->input('itemsLimit');
    $Cita = $this->sinconfirRepo->get($sorter, $tableFilter, $columnFilter, $itemsLimit);
    return response()->json($Cita,200);
  }



}