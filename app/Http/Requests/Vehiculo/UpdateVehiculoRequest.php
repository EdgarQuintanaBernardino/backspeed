<?php
namespace App\Http\Requests\Vehiculo;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVehiculoRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [      
    //'cliente' => 'required|max:150|exists:users,id',
    'plac'=> 'required|max:10',
    'marc'=>'required|max:80',
    'mod' => 'required|max:80',
    'engomado'=> 'required'
    ];    
  }
}