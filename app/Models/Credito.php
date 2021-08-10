<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Credito extends Model
{
  use HasFactory;
  use SoftDeletes;
  use SoftCascadeTrait;
  protected $table = 'credito';
  protected $primaryKey = 'id';
  protected $guarded = [];
  protected $dates = ['deleted_at'];
  protected $softCascade = ['User'];
  public function User()
  {
   return $this->hasOne('App\Models\Users');
   
  }

}