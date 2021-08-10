<?php
namespace App\Repositories\Colaborador;
use App\Repositories\Colaborador\ColaboradorInterface as ColaboradorInterface;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Crypt;

class ColaboradorRepositories implements ColaboradorInterface{
  //guardar registros del colaborador
  public function store($request) {
//Realizar el registro de usuarios 
 $generales = new User();  
    $generales->name=$request->nombre;
    $generales->id_suc_act=$request->sucursal;
    $generales->menuroles=$request->rol;
    $generales->reg_tab_acces=1;
    $generales->notif=0;
    $generales->tip_cliente='null';  
    $generales->email=$request->correo;
    $generales->password=Crypt::encryptString('SpeedPro');
    $generales->asig_reg=auth()->user()->email;
    $generales->created_at_reg=auth()->user()->email;
    $generales->apell=$request->apellidos;
    $generales->email_registro=$request->correo;
    $generales->tel_mov=$request->telefono_movil;
    $generales->emp='Speed Pro';
    $generales->save();  
    return $generales;
 
  }


  //Traer registros de Colaboradores
public function get( $sorter, $tableFilter, $columnFilter, $itemsLimit ){

$db=DB::table('users')
->whereNull('deleted_at')
->where('users.tip_cliente','=','null')
->select('id as id_cliente', 'name as nombre','tel_mov as telefono','email as correo','menuroles as rol');

  if( isset($columnFilter['id_cliente']) ){
      $db->where('id', 'like', '%' . $columnFilter['id_cliente'] . '%');
  }
  if( isset($columnFilter['nombre']) ){
      $db->where('name', 'like', '%' . $columnFilter['nombre'] . '%');
  }
  if( isset($columnFilter['telefono']) ){
    $db->where('tel_mov', 'like', '%' . $columnFilter['telefono'] . '%');
}
if( isset($columnFilter['correo']) ){
    $db->where('email', 'like', '%' . $columnFilter['correo'] . '%');
  }
if( isset($columnFilter['rol']) ){
  $db->where('menuroles', 'like', '%' . $columnFilter['rol'] . '%');
}


if( strlen($tableFilter) > 0 ){
  $db->where(function ($query) use ($tableFilter) {
      $query->where('id', 'like',                 '%' . $tableFilter . '%')
            ->orWhere('name', 'like',              '%' . $tableFilter . '%') 
            ->orWhere('tel_mov', 'like',              '%' . $tableFilter . '%')
            ->orWhere('email', 'like',              '%' . $tableFilter . '%')
            ->orWhere('menuroles', 'like',              '%' . $tableFilter . '%');
            //->orWhere('vehiculos.id_vehiculo', 'like',              '%' . $tableFilter . '%')
                           
  });
}


if( !empty($sorter) ){
  if($sorter['asc'] === false){
      $sortCase = 'desc';
  }else{
      $sortCase = 'asc';
  }

  switch($sorter['column']){
    case 'id_cliente':
      $db->orderBy('id',$sortCase);
    break;
    case 'nombre':
          $db->orderBy('name',$sortCase);
    break;
    case 'telefono':
        $db->orderBy('tel_mov',$sortCase);
    break;
    case 'correo':
        $db->orderBy('email',$sortCase);
    break;

  case 'rol':
    $db->orderBy('menuroles',$sortCase);
  break;
  
  }
}

return $db->paginate($itemsLimit);

  }

/*
  public function getFindOrFail($id_user,$relaciones) {
    return User::with($relaciones)->findOrFail($id_user);
  } */
/*
  public function update($request, $id_user) {
    $generales           = $this->generalCacheRepo->getFindOrFailCache($id_user);
   $generales->name     = $request->name;
    $generales->apell    = $request->apell;
    $generales->email  = $request->email;
    $generales->email_secund  = $request->email_secund;
    $generales->tel_fij  = $request->tel_fij;
    $generales->tel_mov  = $request->tel_mov;
    $generales->tip_cliente  = $request->tip_cliente;
    $generales->emp  = $request->emp;
    $generales->id_suc_act = $request->id_suc_act;
    $generales->reg_tab_acces = $request->reg_tab_acces;

    if($generales->isDirty()) {
      $info = (object) [
        'modulo'=>'Clientes', 'modelo'=>'App\Models\Users', 'ruta'=>'Detalles Cliente', 'permisos'=>'general.show,general.edit', 'request'=>$generales,
        'campos'  => [
                        ['name','Nombre'],
                        ['apell','Apellidos'],
                        ['email','Correo'],
                        ['email_secund','Correo secundario'],
                        ['tel_fij', 'Telefono fijo'],
                        ['tel_mov', 'Telefono movil'],
                        ['tip_cliente', 'Tipo cliente'],
                        ['emp', 'Empresa'],
                        ['id_suc_act', 'Sucursal'],
                        ['reg_tab_acces', 'Acceso']
                      ]];
      // Dispara el evento registrado en App\Providers\EventServiceProvider.php  
      ActividadesRegistradas::dispatch($info); 
      $generales->updated_at_reg  = auth()->user()->email_registro;
    }
    $generales->save();
    return $generales;
  }*/
  public function getAllCache()
  {
    $colaborador=User::where('menuroles','=','Conductor')->orderBy('name','asc')->get('name');
    return $colaborador;
  } 

}
 



