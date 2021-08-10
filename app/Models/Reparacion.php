<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Reparacion extends Model
{
    use SoftDeletes;
    use HasFactory;
    use SoftCascadeTrait;
    protected $table = 'reparacions';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
 //  protected $softCascade = ['vehiculos','Factura','Credito','directorios'];
  
 public function cotizacion(){
    return $this->belongsToMany('App\Models\Cotizacion','reparacion_cotizacion','reparacion_id','cotizacion_id');
  }

  public function vehiculos(){
    return $this->belongsToMany('App\Models\Vehiculo','vehiculo_reparacion','vehiculo_id','reparacion_id');
  }



  public function catalogos(){
    return $this->belongsToMany('App\Models\Catalogo','reparacion_catalogo','catalogo_id','reparacion_id');
  }
  public function refacciones(){
    return $this->belongsToMany('App\Models\Refaccion','reparacion_refaccion','refaccion_id','reparacion_id');
  }
  public function mano_obras(){
    return $this->belongsToMany('App\Models\ManoObra','reparacion_mano_obra','mano_id','reparacion_id');
  }


       
    
}
