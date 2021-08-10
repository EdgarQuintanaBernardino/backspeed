<?php
namespace App\Http\Controllers\ClienteVehiculo;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;

// Repositories
use App\Repositories\ClienteVehiculo\ClienteVehiculoRepositories;

class ClienteVehiculoController extends Controller {
//Constructor para traer a nuestro repositorio
  protected $clientevehicRepo;
  public function __construct(ClienteVehiculoRepositories $clientevRepositories) {
    $this->clientevehicRepo= $clientevRepositories;
  }
//Mandar datos en una tabla filtrada
  public function index(Request $request) {
    $sorter         = $request->input('sorter');
    $tableFilter    = $request->input('tableFilter');
    $columnFilter   = $request->input('columnFilter');
    $itemsLimit     = $request->input('itemsLimit');
    $clientev = $this->clientevehicRepo->get($sorter, $tableFilter, $columnFilter, $itemsLimit);
    return response()->json($clientev,200);
  }
}