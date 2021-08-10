<?php
namespace App\Http\Requests\Rol;
use Illuminate\Foundation\Http\FormRequest;

class StoreRolRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [
      'nombre'     => 'required',
    ];
  }
}