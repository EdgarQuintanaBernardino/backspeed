<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Recordatorio extends Model
{
    use SoftDeletes;
    use HasFactory;
    use SoftCascadeTrait;
    protected $table = 'recordatorios';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public function citas()
    {
    return $this->belongsTo('App\Models\Cita','cita_id');
    
    }
}