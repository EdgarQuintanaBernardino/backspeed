<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Vehiculo extends Model
{
  use HasFactory;
  protected $table = 'vehiculos';
  protected $primaryKey = 'id';
  protected $guarded = [];
//Relacion de muchos a muchos 

  public function users(){
    return $this->belongsToMany('App\Models\Users','user_vehiculo','vehiculo_id','user_id');
  }

  public function reparaciones(){
    return $this->belongsToMany('App\Models\Reparacion','vehiculo_reparacion','vehiculo_id','reparacion_id');
  }
//Relacion de uno a muchos
public function cotizaciones(){
  return $this->belongsToMany('App\Models\Cotizacion','vehiculo_cotizacion','vehiculo_id','cotizacion_id');
}

public function recepciones(){
  return $this->belongsToMany('App\Models\Recepcion','recepcion_vehiculo','vehiculo_id','recepcion_id');
}


    
}