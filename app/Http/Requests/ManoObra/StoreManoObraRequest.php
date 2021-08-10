<?php
namespace App\Http\Requests\ManoObra;
use Illuminate\Foundation\Http\FormRequest;

class StoreManoObraRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [      
        'nombre'=> 'required|max:50',
        'subtotal'=> 'required|max:10',
        
    ] ;    
  }
}