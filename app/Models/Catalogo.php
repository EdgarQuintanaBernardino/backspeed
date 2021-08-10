<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Catalogo extends Model {
  use HasFactory;
  use SoftDeletes;
  use SoftCascadeTrait;

  protected $table = 'catalogos';
  protected $primaryKey = 'id';
  protected $guarded = [];

  protected $dates = ['deleted_at'];
   //protected $softCascade = []; // SE INDICAN LOS NOMBRES DE LAS RELACIONES CON LA QUE TENDRA BORRADO EN CASCADA
  //Relacion de uno a muchos

  public function cotizaciones(){
    return $this->belongsToMany('App\Models\Cotizacion','catalogo_cotizacion','catalogo_id','cotizacion_id');
  }

  public function reparaciones(){
    return $this->belongsToMany('App\Models\Reparacion','reparacion_catalogo','catalogo_id','reparacion_id');
  }



  }
