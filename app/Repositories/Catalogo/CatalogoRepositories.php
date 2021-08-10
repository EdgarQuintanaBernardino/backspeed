<?php
namespace App\Repositories\Catalogo;
//Models
use App\Models\Catalogo;
use App\Models\Refaccion;
use App\Models\Reparacion;
use App\Models\ManoObra;

//Base de datos
use Illuminate\Support\Facades\DB;

// Otros
use Illuminate\Support\Facades\Cache;


class CatalogoRepositories implements CatalogoInterface {
  public function get( $sorter, $tableFilter, $columnFilter, $itemsLimit ){

    $db=DB::table('catalogos')
    ->whereNull('deleted_at')
    ->select('id','nom as nombre','descrip as descripcion','costo','precio','total_produc as total','sugerido');
  
    if( isset($columnFilter['id']) ){
      $db->where('id', 'like', '%' . $columnFilter['id'] . 
      '%');
  }
    if( isset($columnFilter['nombre']) ){
          $db->where('nom', 'like', '%' . $columnFilter['nombre'] . 
          '%');
      }
      if( isset($columnFilter['descripcion']) ){
          $db->where('descrp', 'like', '%' . $columnFilter['descripcion'] . '%');
      }
      if( isset($columnFilter['costo']) ){
        $db->where('costo', 'like', '%' . $columnFilter['costo'] . '%');
    }
    if( isset($columnFilter['precio']) ){
        $db->where('precio', 'like', '%' . $columnFilter['precio'] . '%');
      }
    if( isset($columnFilter['total']) ){
      $db->where('total_produc', 'like', '%' . $columnFilter['total'] . '%');
    }
    if( isset($columnFilter['sugerido']) ){
      $db->where('sugerido', 'like', '%' . $columnFilter['sugerido'] . '%');
    }

    
    if( strlen($tableFilter) > 0 ){
      $db->where(function ($query) use ($tableFilter) {
          $query->where('id', 'like',                 '%' . $tableFilter . '%')
                ->orWhere('nom', 'like',              '%' . $tableFilter . '%') 
                ->orWhere('descrip', 'like',              '%' . $tableFilter . '%') 
                ->orWhere('costo', 'like',              '%' . $tableFilter . '%')
                ->orWhere('precio', 'like',              '%' . $tableFilter . '%')
                ->orWhere('total_produc', 'like',              '%' . $tableFilter . '%')
                ->orWhere('sugerido', 'like',              '%' . $tableFilter . '%');         
      });
    }
    
    
    if( !empty($sorter) ){
      if($sorter['asc'] === false){
          $sortCase = 'desc';
      }else{
          $sortCase = 'asc';
      }
    
      switch($sorter['column']){
        case 'id':
          $db->orderBy('id',$sortCase);
        break;
        case 'nombre':
          $db->orderBy('nom',$sortCase);
        break;
        case 'descripcion':
              $db->orderBy('descrip',$sortCase);
        break;
        case 'costo':
            $db->orderBy('costo',$sortCase);
        break;
        case 'precio':
            $db->orderBy('precio',$sortCase);
        break;
        case 'total':
          $db->orderBy('total_produc',$sortCase);
      break;
      case 'sugerido':
        $db->orderBy('sugerido',$sortCase);
    break;
      }
    }
    
    return $db->paginate($itemsLimit);
    
      }



      //Realizar el registro de un nuevo Catalogo
      public function store($request) {
    
        DB::beginTransaction();/*Uso de transacciones,no se realizarán registros de
         ninguna tabla si no se cumplen con los requerimientos */
        try {

     //Realizar el registro de Mano Obra
     $mano_obra = new ManoObra();  
     $mano_obra->nom=$request->nom;
     $mano_obra->pre_hora=$request->pre_hora;
     $mano_obra->horas=$request->horas;
     $mano_obra->subtotal=$request->subtotal;
    

   $mano_obra->save();

 //Refaccion
 $refaccion = new Refaccion();  
 $refaccion->nom=$request->nom;
 $refaccion->cost_unit=$request->cost_unit;
 $refaccion->prec_venta=$request->prec_venta;
 $refaccion->cant=$request->cant;
 $refaccion->subtotal=$request->subtotal;
 
$refaccion->save();
   //Reparación
   $reparacion = new Reparacion();  
   $reparacion->nom=$request->nombre_rep;
   $reparacion->total=$request->total;

 
   
 $reparacion->save();  
         
    //Realizar el registro de Catalogo
     $paquete = new Catalogo();  
    
  
        $paquete->descrip=$request->descrip;
        $paquete->cilindros=$request->cilindros;  
        $paquete->marca=$request->make;
        $paquete->modelo=$request->model;
        $paquete->categoria=$request->categoria;
        $paquete->costo=$request->costo;  
        $paquete->precio=$request->precio;  
        $paquete->total_produc=$request->total_produc;  
        $paquete->created_at_reg=auth()->user()->email;
        
 
      $paquete->save();  
      
    DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
          return $e->getMessage();      
        }
        return $mano_obra;
        return $refaccion;
        return $reparacion;
        return $paquete;
     
      }
}
