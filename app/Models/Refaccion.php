<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Refaccion extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'refacciones';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

   
    public function reparaciones(){
      return $this->belongsToMany('App\Models\Reparacion','reparacion_refaccion','refaccion_id','reparacion_id');
    }

}



