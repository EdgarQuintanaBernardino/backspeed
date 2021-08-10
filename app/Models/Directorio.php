<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Directorio extends Model
{
  use HasFactory;
  use SoftDeletes;
  use SoftCascadeTrait;
  protected $table = 'directorios';
  protected $primaryKey = 'id';
  protected $guarded = [];
  protected $dates = ['deleted_at'];
  protected $softCascade = ['User'];
//Relacion de muchos a muchos
  public function user(){
    return $this->belongsTo('App\Models\Users');
  }
  
}
