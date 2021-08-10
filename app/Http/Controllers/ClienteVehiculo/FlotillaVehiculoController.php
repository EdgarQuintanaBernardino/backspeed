<?php
namespace App\Http\Controllers\ClienteVehiculo;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;

// Repositories
use App\Repositories\ClienteVehiculo\FlotillaVehiculoRepositories;

class FlotillaVehiculoController extends Controller {
//Constructor para traer a nuestro repositorio
  protected $flotillavehicRepo;
  public function __construct(FlotillaVehiculoRepositories $flotillavRepositories) {
    $this->flotillavehicRepo= $flotillavRepositories;
  }
//Mandar datos en una tabla filtrada
  public function index(Request $request) {
    $sorter         = $request->input('sorter');
    $tableFilter    = $request->input('tableFilter');
    $columnFilter   = $request->input('columnFilter');
    $itemsLimit     = $request->input('itemsLimit');
    $flotillav = $this->flotillavehicRepo->get($sorter, $tableFilter, $columnFilter, $itemsLimit);
    return response()->json($flotillav,200);
  }
}