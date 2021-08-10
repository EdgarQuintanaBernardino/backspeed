<?php
namespace App\Repositories\Cotizacion\ManoObra;
use App\Repositories\Cotizacion\ManoObra\ManoObraInterface;
use Illuminate\Support\Facades\DB;
use App\Models\ManoObra;
use App\Repositories\Cotizacion\ManoObra\ManoObraCacheRepositories;
use Illuminate\Support\Facades\Cache;
use App\Events\layouts\ActividadesRegistradas;
use Illuminate\Support\Facades\Crypt;

class ManoObraRepositories implements ManoObraInterface{

  protected $mobraCacheRepo;
  public function __construct(ManoObraCacheRepositories $manoObraCacheRepositories) {
    $this->mobraCacheRepo = $manoObraCacheRepositories;
  } 

  //Traer registros de Mano de Obra
public function get( $sorter, $tableFilter, $columnFilter, $itemsLimit ){

$db=DB::table('mano_obras')->whereNull('deleted_at')
->select('id','nom as nombre','pre_hora','horas','subtotal');
  if( isset($columnFilter['id']) ){
    $db->where('id', 'like', '%' . $columnFilter['id'] . '%');
}
  if( isset($columnFilter['nombre']) ){
      $db->where('nom', 'like', '%' . $columnFilter['nombre'] . '%');
  }
  if( isset($columnFilter['pre_hora']) ){
      $db->where('pre_hora', 'like', '%' . $columnFilter['pre_hora'] . '%');
  }
  if( isset($columnFilter['horas']) ){
    $db->where('horas', 'like', '%' . $columnFilter['horas'] . '%');
}
if( isset($columnFilter['subtotal']) ){
  $db->where('subtotal', 'like', '%' . $columnFilter['subtotal'] . '%');
}



if( strlen($tableFilter) > 0 ){
  $db->where(function ($query) use ($tableFilter) {
      $query->where('nom', 'like',                 '%' . $tableFilter . '%')
            ->orWhere('pre_hora', 'like',              '%' . $tableFilter . '%')
            ->orWhere('horas', 'like',              '%' . $tableFilter . '%')
            ->orWhere('subtotal', 'like',              '%' . $tableFilter . '%'); 
                  
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
    case 'pre_hora':
          $db->orderBy('pre_hora',$sortCase);
    break;
    case 'horas':
      $db->orderBy('horas',$sortCase);
break;
case 'subtotal':
  $db->orderBy('subtotal',$sortCase);
break;
    
  }
}

return $db->paginate($itemsLimit);

  }
    //guardar registros de una nueva Mano de Obra
    public function store($request) {
      //Realizar el registro de Mano de Obra 
       $m_obra = new ManoObra();  
          $m_obra->nom=$request->nombre;
          $m_obra->subtotal=$request->subtotal; 
          $m_obra->save();
          return $m_obra;
        }


//Actualizar Mano de obra
        public function update($request, $id) {
          $m_obra           = $this->mobraCacheRepo->getFindOrFailCache($id);
          $m_obra->nom=$request->nom;
          $m_obra->subtotal=$request->subtotal; 
         
          if($m_obra->isDirty()) {
            $info = (object) [
              'modulo'=>'ManoObra','modelo'=>'App\Models\ManoObra', 'ruta'=>'Detalles ManoObra', 'permisos'=>'mano_obra.show,mano_obra.edit', 'request'=>$m_obra,
              'campos'  => [
                              ['nom','Nombre'],
                              ['subtotal','Total'],
                              
                            ]];
            // Dispara el evento registrado en App\Providers\EventServiceProvider.php  
            ActividadesRegistradas::dispatch($info); 
          }
          $m_obra->save();
          return $m_obra;
        }

        public function getFindOrFail($id,$relaciones) {
          return ManoObra::with($relaciones)->findOrFail($id);
        } 


}
 

