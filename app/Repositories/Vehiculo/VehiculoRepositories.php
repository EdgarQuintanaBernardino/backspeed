<?php
namespace App\Repositories\Vehiculo;
use App\Repositories\Vehiculo\VehiculoInterface as VehiculoInterface ;
use Illuminate\Support\Facades\DB;
use App\Models\Vehiculo;
use App\Models\Users;
use App\Repositories\Cliente\General\GeneralRepositories;
use App\Repositories\Vehiculo\VehiculoCacheRepositories;
use App\Events\layouts\ActividadesRegistradas;
use Illuminate\Support\Facades\Cache;

class VehiculoRepositories implements VehiculoInterface {
  protected $vehiculoCacheRepo;
  protected $usersCacheRepo;
  public function __construct(GeneralRepositories $GeneralRepositories,VehiculoCacheRepositories $vehiculoCacheRepositories) {
    $this->vehiculoCacheRepo = $vehiculoCacheRepositories;
    $this->usersCacheRepo = $GeneralRepositories;
  } 

  public function get( $sorter, $tableFilter, $columnFilter, $itemsLimit ){
    $db=DB::table('vehiculos') 
    
    ->select('marc as marca','plac as placas','vin','año');
    
    if( isset($columnFilter['marca']) ){
          $db->where('marc', 'like', '%' . $columnFilter['marca'] . '%');
      }
    if( isset($columnFilter['placas']) ){
          $db->where('plac', 'like', '%' . $columnFilter['plac'] . '%');
      }
    if( isset($columnFilter['vin']) ){
        $db->where('vin', 'like', '%' . $columnFilter['vin'] . '%');
    }
    if( isset($columnFilter['año']) ){
      $db->where('año', 'like', '%' . $columnFilter['año'] . '%');
    }
    
    if( strlen($tableFilter) > 0 ){
      $db->where(function ($query) use ($tableFilter) {
          $query->where('marc', 'like',                 '%' . $tableFilter . '%')
                ->orWhere('plac', 'like',              '%' . $tableFilter . '%') 
                ->orWhere('vin', 'like',              '%' . $tableFilter . '%')
                ->orWhere('año', 'like',              '%' . $tableFilter . '%');                       
      });
    }
    if( !empty($sorter) ){
      if($sorter['asc'] === false){
          $sortCase = 'desc';
      }else{
          $sortCase = 'asc';
      }
      switch($sorter['column']){
        case 'marca':
          $db->orderBy('marc',$sortCase);
        break;
        case 'placas':
              $db->orderBy('plac',$sortCase);
        break;
        case 'vin':
            $db->orderBy('vin',$sortCase);
        break;
        case 'año':
          $db->orderBy('año',$sortCase);
      break;
           
      }
    }
    return $db->paginate($itemsLimit);
    
      }


  public function store($request) {
     
    DB::beginTransaction();/*Uso de transacciones,no se realizarán registros de
     ninguna tabla si no se cumplen con los requerimientos */
    try {
    $vehiculo = new Vehiculo();
    $vehiculo->tip=$request->tipo;
    $vehiculo->nom_client=$request->name;
    $vehiculo->plac=$request->placas;
    $vehiculo->vin=$request->n_chasis;
    $vehiculo->marc=$request->make;
    $vehiculo->mod=$request->model;
    $vehiculo->cat=$request->categoria;
    $vehiculo->año=$request->año;
    $vehiculo->n_motor=$request->n_motor;
    $vehiculo->c_principal=$request->color;
    $vehiculo->engomado=$request->engomado;
    $vehiculo->m_motor=$request->marca_motor;
    $vehiculo->trans=$request->transmision;
    $vehiculo->save();

    $user=Users::findorfail($request->name);
    $user->vehiculos()->attach($vehiculo->id);
 

    DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
   return $vehiculo;
  
  }

  public function getAllCache()
  { 
      $vehiculo= Vehiculo::get();
      return $vehiculo;
  }


  public function update($request, $id_vehiculo) {
    $vehiculo           = $this->vehiculoCacheRepo->getFindOrFailCache($id_vehiculo);
   $vehiculo->plac    = $request->plac;
    $vehiculo->vin    = $request->vin;
    $vehiculo->marc  = $request->marc;
    $vehiculo->mod = $request->mod;
    $vehiculo->cat = $request->cat;
    $vehiculo->año = $request->año;
    $vehiculo->n_motor = $request->n_motor;
    $vehiculo->c_principal = $request->c_principal;
    $vehiculo->engomado = $request->engomado;
    $vehiculo->m_motor = $request->m_motor;
    $vehiculo->trans = $request->trans;

   

    if($vehiculo->isDirty()) {
      $info = (object) [
        'modulo'=>'Vehiculos', 'modelo'=>'App\Models\Vehiculo', 'ruta'=>'Detalles Vehiculos', 'permisos'=>'vehiculo.show,vehiculo.edit', 'request'=>$vehiculo,
        'campos'  => [
                        ['plac','Placas'],
                        ['vin','VIN'],
                        ['marc','Marca'],
                        ['mod','Modelo'],
                        ['cat', 'Categoria'],
                        ['año', 'Año'],
                        ['n_motor', 'No.Motor'],
                        ['c_principal', 'Color Principal'],
                        ['engomado', 'Engomado'],
                        ['m_motor', 'Marca de motor'],
                        ['trans', 'Transmision'],
                        
                      ]];
      // Dispara el evento registrado en App\Providers\EventServiceProvider.php 
      ActividadesRegistradas::dispatch($info); 
    // $vehiculo->updated_at_reg  = auth()->user()->email_registro;
    }
    $vehiculo->save();
    return $vehiculo;
  }

  public function getFindOrFail($id_vehiculo,$relaciones) {
    return Vehiculo::with($relaciones)->findOrFail($id_vehiculo);
  } 
}


