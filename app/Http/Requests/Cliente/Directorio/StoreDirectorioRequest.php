<?php
namespace App\Http\Requests\Cliente\Directorio;
use Illuminate\Foundation\Http\FormRequest;

class StoreDirectorioRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [
      'nombre'=> 'required|max:100',
      'correo'=> 'required|max:200',
      'telefono'=> 'required|max:12',
    ];
  }
}