<?php
namespace App\Repositories\Cliente\Empresa;
// Models
use App\Models\Users;
// Otros
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class EmpresaRepositories implements EmpresaInterface {


  public function getAllCache()
  {
      $empresa = users::orderBy('emp','asc')->distinct('emp')->get('emp');
      return $empresa;
  }



}

