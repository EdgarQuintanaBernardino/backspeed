<?php
namespace App\Repositories\Rol;
// Models
use App\Models\Rol;
// Otros
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class RolRepositories implements RolInterface {
  public function getAllCache()
  {
      $rol = Rol::where('nom','=','Cliente')->orwhere('nom','=','Colaborador')->orderBy('nom', 'asc')->get();
      return $rol;
  }
  //trae los datos a un multiselect
  public function getAll()
  {
      $rol = Rol::orderBy('nom', 'asc')->get();
      return $rol;
  }

  public function store($request) {
    $rol = new Rol();
    $rol->nom=$request->nombre;
    $rol->name=$request->nombre;
    $rol->guard_name='api';
    $rol->desc=$request->descripcion;
    $rol->asig_reg=auth()->user()->email;
    $rol->created_at_reg=auth()->user()->email;
    $rol->save();
    return $rol;

  }

} 