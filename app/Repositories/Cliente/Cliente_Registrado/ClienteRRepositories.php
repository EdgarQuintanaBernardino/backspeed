<?php
namespace App\Repositories\Cliente\Cliente_Registrado;
// Models
use App\Models\User;
// Otros
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
class ClienteRRepositories implements ClienteRInterface {
//Se realiza la consulta para traer clientes 
 
public function getAllCache()
  {
    $cliente= User::where('menuroles','=','user')->orderBy('name','asc')->get();
    return $cliente;
  } 
}


