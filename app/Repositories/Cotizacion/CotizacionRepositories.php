<?php
namespace App\Repositories\Cotizacion;
use App\Repositories\Cotizacion\CotizacionInterface as CotizacionInterface;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Users;
use Illuminate\Support\Facades\Cache;
use App\Events\layouts\ActividadesRegistradas;
use Illuminate\Support\Facades\Crypt;
//Models
use App\Models\Catalogo;
use App\Models\Refaccion;
use App\Models\Reparacion;
use App\Models\ManoObra;
use App\Models\Cotizacion;

class CotizacionRepositories implements CotizacionInterface{

  //Traer registros de Cotizacion
public function get( $sorter, $tableFilter, $columnFilter, $itemsLimit ){

$db=DB::table('cotizacion')->whereNull('cotizacion.deleted_at')

->rightjoin('users','cotizacion.id','users.id')
->leftjoin('vehiculos','cotizacion.id','vehiculos.id')


->select('cotizacion.tip_orden','cotizacion.id','users.name','vehiculos.marc','vehiculos.plac','vehiculos.mod','cotizacion.gran_total');

  if( isset($columnFilter['tip_orden']) ){
      $db->where('cotizacion.tip_orden', 'like', '%' . $columnFilter['tip_orden'] . '%');
  }
 
  if( isset($columnFilter['name']) ){
      $db->where('users.name', 'like', '%' . $columnFilter['name'] . '%');
  }
  if( isset($columnFilter['marc']) ){
    $db->where('vehiculos.marc', 'like', '%' . $columnFilter['marc'] . '%');
}
if( isset($columnFilter['plac']) ){
  $db->where('vehiculos.plac', 'like', '%' . $columnFilter['plac'] . '%');
}
if( isset($columnFilter['mod']) ){
  $db->where('vehiculos.mod', 'like', '%' . $columnFilter['mod'] . '%');
}
if( isset($columnFilter['gran_total']) ){
    $db->where('cotizacion.gran_total', 'like', '%' . $columnFilter['gran_total'] . '%');
  }


if( strlen($tableFilter) > 0 ){
  $db->where(function ($query) use ($tableFilter) {
      $query->where('cotizacion.tip_orden', 'like',                 '%' . $tableFilter . '%')
            ->orWhere('users.name', 'like',              '%' . $tableFilter . '%') 
            ->orWhere('vehiculos.marc', 'like',              '%' . $tableFilter . '%')
            ->orWhere('vehiculos.plac', 'like',              '%' . $tableFilter . '%')
            ->orWhere('vehiculos.mod', 'like',              '%' . $tableFilter . '%')
            ->orWhere('cotizacion.gran_total', 'like',              '%' . $tableFilter . '%');
           
                           
  });
}
if( !empty($sorter) ){
  if($sorter['asc'] === false){
      $sortCase = 'desc';
  }else{
      $sortCase = 'asc';
  }

  switch($sorter['column']){
    case 'tip_orden':
      $db->orderBy('cotizacion.tip_orden',$sortCase);
    break;
    case 'name':
          $db->orderBy('users.name',$sortCase);
    break;
    case 'marc':
        $db->orderBy('vehiculos.marc',$sortCase);
    break;
    case 'plac':
      $db->orderBy('vehiculos.plac',$sortCase);
  break;
  case 'mod':
    $db->orderBy('vehiculos.mod',$sortCase);
break;
    case 'gran_total':
        $db->orderBy('cotizacion.gran_total',$sortCase);
    break;
  }
}

return $db->paginate($itemsLimit);

  }


   //Realizar el registro de una nueva cotizacion
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
//Cotizacion
$cotizacion = new Cotizacion();  
$cotizacion->tip_orden=$request->tip_orden;
$cotizacion->t_sin_iva=$request->t_sin_iva;
$cotizacion->t_con_iva=$request->t_con_iva;
$cotizacion->t_descuento=$request->t_descuento;
$cotizacion->gran_total=$request->gran_total;
$cotizacion->save();  


  
DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();      
    }
    return $mano_obra;
    return $refaccion;
    return $reparacion;
    return $cotizacion;

 
  }

  /*
  function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
}*/

}
 