<?php
namespace App\Repositories\Encuesta;
//Models
use App\Models\Encuesta;


//Base de datos
use Illuminate\Support\Facades\DB;

// Otros
use Illuminate\Support\Facades\Cache;


class EncuestaRepositories implements EncuestaInterface {


    //Realizar el registro de una nueva encuesta
      public function store($request) {
    
        DB::beginTransaction();/*Uso de transacciones,no se realizarán registros de
         ninguna tabla si no se cumplen con los requerimientos */
        try {
     $encuesta = new Encuesta();  
    
  
        $encuesta->servicio=$request->servicio;
        $encuesta->trato_personal=$request->trato_personal;
        $encuesta->recomendado=$request->recomendado;
        $encuesta->comentarios=$request->comentarios;
      


        $encuesta->save();  
      
    DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
          return $e->getMessage();      
        }
        return $encuesta;
        
 
      }
}
