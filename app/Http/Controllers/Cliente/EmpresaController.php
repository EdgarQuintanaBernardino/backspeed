<?php
namespace App\Http\Controllers\Cliente;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;

// Repositories
use App\Repositories\Cliente\Empresa\EmpresaRepositories;


use Illuminate\Support\Facades\DB;

use App\Models\User;
class EmpresaController extends Controller {

  protected $EmpresaRepo;

  public function __construct(EmpresaRepositories $EmpresaRepositories){
    $this->EmpresaRepo = $EmpresaRepositories;

  }

/* Trae todos los datos del registro de la empresa  */
public function getAllCache(){
  $empresa=$this->EmpresaRepo->getAllCache();
  return response()->json($empresa);
}
}



