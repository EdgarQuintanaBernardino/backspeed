<?php
namespace App\Http\Controllers\Cliente;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;
// Repositories
use App\Repositories\Cliente\Credito\CreditoRepositories;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class CreditoController extends Controller {
//Constructor para traer a nuestro repositorio
  protected $CreditoRepo;
  public function __construct(CreditoRepositories $CreditoRepositories) {
    $this->CreditoRepo = $CreditoRepositories;
  }
//Controlador que guarda nuevos datos de creditos
  public function store(Request $request) {
    $credito = $this->CreditoRepo->store($request);
    return response()->json(['id'=>$credito->id],200);
  }

  public function update(Request $request,$id_credito) {
    $credito = $this->CreditoRepo->update($request,$id_credito);
    return response()->json(['id'=>$credito->id],200);
    }
}