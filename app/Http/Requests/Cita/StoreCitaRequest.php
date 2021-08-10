<?php
namespace App\Http\Requests\Cita;
use Illuminate\Foundation\Http\FormRequest;

class StoreCitaRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [
      'cliente'     => 'required|exists:users,id',
      'hora' => 'required',
      'fecha'=> 'required',

    ];
  }
}