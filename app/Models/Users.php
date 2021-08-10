<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Users extends Model
{
    use SoftDeletes;
    use HasFactory;
    use SoftCascadeTrait;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    protected $softCascade = ['vehiculos','Factura','Credito','directorios'];
    
    public function notes()
    {
        return $this->hasMany('App\Notes');
    }
    public function citas()
    {
        return $this->hasMany('App\Models\Cita');
    }
//Relacion de uno a uno
    public function Factura()
    {
        return $this->hasOne('App\Models\Factura','user_id');
    }
//Relacion de uno a uno
    public function Credito()
    {
        return $this->hasOne('App\Models\Credito','user_id');
    }
//Relacion de uno a muchos
    public function directorios(){
        return $this->hasMany('App\Models\Directorio','user_id');
      }
//Relacion de uno a muchos
      public function vehiculos(){
        return $this->belongsToMany('App\Models\Vehiculo','user_vehiculo','user_id','vehiculo_id');
      }
      public function cotizaciones(){
        return $this->belongsToMany('App\Models\Cotizacion','user_cotizacion','user_id','cotizacion_id');
      }
      public function recepciones(){
        return $this->belongsToMany('App\Models\Recepcion','recepcion_cliente','cliente_id','recepcion_id');
      }
}

