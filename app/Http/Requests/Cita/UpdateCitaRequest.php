<?php
namespace App\Http\Requests\Cita;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCitaRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [
      'hora' => 'required',
      'fecha'=> 'required',
    ];
  }
}