<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Cotizacion extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'cotizacion';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function users(){
        return $this->belongsToMany('App\Models\Users','user_cotizacion','user_id','cotizacion_id');
      }

      public function vehiculo(){
        return $this->belongsToMany('App\Models\Vehiculo','vehiculo_cotizacion','vehiculo_id','cotizacion_id');
      }
      public function reparaciones(){
        return $this->belongsToMany('App\Models\Reparacion','reparacion_cotizacion','reparacion_id','cotizacion_id');
      }

      public function catalogos(){
        return $this->belongsToMany('App\Models\Catalogo','catalogo_cotizacion','catalogo_id','cotizacion_id');
      }
    public function recepcion(){
        return $this->hasMany('App\Models\Recepcion');
      }
}
