<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Encuesta extends Model
{
    use HasFactory;
    use SoftDeletes;
 
    protected $table = 'encuestas';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
}
