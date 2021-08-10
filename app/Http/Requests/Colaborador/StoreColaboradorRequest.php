<?php
namespace App\Http\Requests\Colaborador;
use Illuminate\Foundation\Http\FormRequest;

class StoreColaboradorRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [      
        'nombre'=> 'required|max:40',
        'apellidos'=> 'required|max:40',
        'correo'=> 'required|max:75',
       // 'contraseña'=>'required',
        'telefono_movil'=> 'required|max:14',
       // 'tip_cliente'=> 'required', 
        //'empresa'=>'required',
        'sucursal'=>'required|max:150|exists:sucursales,id',
        'rol'=>'required|exists:roles,nom'
        //'acceso'=>'required|max:150|exists:roles,id',
        //'notificacion'=>'required',  
    ] ;    
  }
}