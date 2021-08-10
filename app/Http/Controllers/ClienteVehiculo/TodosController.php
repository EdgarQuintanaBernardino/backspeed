<?php
namespace App\Http\Controllers\ClienteVehiculo;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;

// Repositories
use App\Repositories\ClienteVehiculo\TodosRepositories;

class TodosController extends Controller {
//Constructor para traer a nuestro repositorio
  protected $todosRepo;
  public function __construct(TodosRepositories $todosRepositories) {
    $this->todosRepo= $todosRepositories;
  }
//Mandar datos en una tabla filtrada
  public function index(Request $request) {
    $sorter         = $request->input('sorter');
    $tableFilter    = $request->input('tableFilter');
    $columnFilter   = $request->input('columnFilter');
    $itemsLimit     = $request->input('itemsLimit');
    $todos = $this->todosRepo->get($sorter, $tableFilter, $columnFilter, $itemsLimit);
    return response()->json($todos,200);
  }
}