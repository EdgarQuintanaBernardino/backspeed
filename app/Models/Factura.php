<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Factura extends Model
{
  use HasFactory;
  use SoftDeletes;
  use SoftCascadeTrait;
  protected $table = 'facturacion';
  protected $primaryKey = 'id';
  protected $guarded = [];
  protected $dates = ['deleted_at'];
  protected $softCascade = ['User'];
//Relación de uno a uno
  public function User()
  {
   return $this->belongsTo('App\Models\Users','user_id');
   
  }
  
}