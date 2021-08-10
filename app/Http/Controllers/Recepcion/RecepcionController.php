<?php
namespace App\Http\Controllers\Recepcion;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;

// Repositories
use App\Repositories\Recepcion\RecepcionRepositories;

class RecepcionController extends Controller {
  protected $recepRepo;
  public function __construct(RecepcionRepositories $recepcionRepositories) {
    $this->recepRepo    = $recepcionRepositories;
  }
 
  public function store(Request $request) {
    // return $request;
    $recepcion = $this->recepRepo->store($request);
    return response()->json([$recepcion->id],200);
  }

  
}