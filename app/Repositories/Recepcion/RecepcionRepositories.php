<?php
namespace App\Repositories\Recepcion;
use App\Repositories\Recepcion\RecepcionInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Recepcion;
use App\Models\Users;
use App\Models\Vehiculo;

class RecepcionRepositories implements RecepcionInterface{
  public function store($request) {
    DB::beginTransaction();/*Uso de transacciones,no se realizarán registros de
    ninguna tabla si no se cumplen con los requerimientos */
   try {
    $Recepcion = new Recepcion();
    $Recepcion->cliente=$request->cliente;
    $Recepcion->vehiculo=$request->vehiculo;
    $Recepcion->n_orden=$request->num_orden;
    $Recepcion->tip_serv=$request->servicio;
    $Recepcion->kilometraje=$request->kilometraje;
    $Recepcion->n_combustible=$request->combustible;
    $Recepcion->componentes='todos';
    $Recepcion->cantTapetes=$request->cantTapetes;
    $Recepcion->cantTapones=$request->cantTapones;
    $Recepcion->cantEspejos=$request->cantEspejos;
    $Recepcion->desc_falla=$request->nota_cliente;
    $Recepcion->obs_general=$request->observaciones;
    $Recepcion->fotos=$request->fotos;

    $Recepcion->save();
    
    
   $user=Users::findorfail($request->cliente);
  $user->recepciones()->attach($Recepcion->id);

$vehiculo=Vehiculo::findorfail($request->vehiculo);
$vehiculo->recepciones()->attach($Recepcion->id);

    DB::commit();
  } catch (\Exception $e) {
    DB::rollback();
    return $e->getMessage();
  }
return $user;
return $vehiculo;
return $Recepcion;
  }

  
}
