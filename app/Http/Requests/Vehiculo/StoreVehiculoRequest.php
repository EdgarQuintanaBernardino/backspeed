<?php
namespace App\Http\Requests\Vehiculo;
use Illuminate\Foundation\Http\FormRequest;

class StoreVehiculoRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [      
    'name' => 'required|max:150|exists:users,id',
    'placas'=> 'required|max:7',
    //'marcas'=>'required|max:80',
    //'modelos' => 'required|max:80',
    'engomado'=> 'required'
    ] ;    
  }
}

