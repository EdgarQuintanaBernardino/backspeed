<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class RoleHierarchy extends Model
{   
    use SoftDeletes;
    use HasFactory;
    use SoftCascadeTrait;
 
    protected $table = 'role_hierarchy';
    public $timestamps = false;
   
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    protected $softCascade = [''];
    
}
