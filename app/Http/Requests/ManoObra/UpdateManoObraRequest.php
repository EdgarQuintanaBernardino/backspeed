<?php
namespace App\Http\Requests\ManoObra;
use Illuminate\Foundation\Http\FormRequest;

class UpdateManoObraRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [      
        'nom'=> 'required|max:80',
        'subtotal'=> 'required|max:10',
        
    ] ;    
  }
}