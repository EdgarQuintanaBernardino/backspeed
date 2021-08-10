<?php
namespace App\Http\Requests\Cliente\Generales;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGeneralRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [
      'name'=> 'required|max:40',
      'apell'=> 'required|max:40',
      'email'=> 'required|max:75',
      'tel_mov'=> 'required|max:14',
      'tip_cliente'=> 'required',
      'emp'=>'required',
     'id_suc_act'=>'required|max:150|exists:sucursales,suc',
   

    ];
  }
}