<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;


class ManoObra extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'mano_obras';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function reparaciones(){
        return $this->belongsToMany('App\Models\Reparacion','reparacion_mano_obra','mano_id','reparacion_id');
      }
}
