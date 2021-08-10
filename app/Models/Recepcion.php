<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Recepcion extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'recepcion';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

   //Relacion de uno a muchos
   public function cotizacion(){
    return $this->hasMany('App\Models\Cotizacion','cotizacion_id');
  }
  public function vehiculos(){
    return $this->belongsToMany('App\Models\Vehiculo','recepcion_vehiculo','vehiculo_id','recepcion_id');
  }
  public function users(){
    return $this->belongsToMany('App\Models\Users','recepcion_cliente','cliente_id','recepcion_id');
  }
}

