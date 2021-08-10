<?php
namespace App\Repositories\Recordatorio;
use App\Repositories\Recordatorio\RecordatorioInterface as RecordatorioInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Recordatorio;


class CitaRepositories implements CitaInterface{
  public function store($request) {
    $Recordatorio = new Recordatorio();
    $Recordatorio->notif=$request->notificacion;
    $Recordatorio->anti_dias=$request->dias;
    $Recordatorio->medio=$request->medio;

    $Recordatorio->save();
    return $Recordatorio;
  }
}