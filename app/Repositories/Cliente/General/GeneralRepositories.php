<?php
namespace App\Repositories\Cliente\General;
use App\Repositories\Cliente\General\GeneralInterface as GeneralInterface;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Users;
use App\Models\Credito;
use App\Models\Factura;
use App\Models\Directorio;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Cache;
use App\Events\layouts\ActividadesRegistradas;
use App\Repositories\Cliente\General\GeneralCacheRepositories;
use App\Repositories\Cliente\Factura\FacturaCacheRepositories;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
class GeneralRepositories implements GeneralInterface{
  protected $generalCacheRepo;
  public function __construct(GeneralCacheRepositories $generalCacheRepositories,FacturaCacheRepositories $facturaCacheRepositories) {
    $this->generalCacheRepo = $generalCacheRepositories;
    $this->facturaCacheRepo = $facturaCacheRepositories;
  } 
  //guardar registros del cliente
  public function store($request) {
    
    DB::beginTransaction();/*Uso de transacciones,no se realizarán registros de
     ninguna tabla si no se cumplen con los requerimientos */
    try {
     
//Realizar el registro de usuarios 
 $generales = new User();  
    $generales->name=$request->nombre;
    $generales->id_suc_act=$request->sucursal;
    $generales->reg_tab_acces='cliente';

    $generales->notif=$request->notificacion;
    
    $generales->tip_cliente=$request->tip_cliente;  
    $generales->email=$request->correo;
    $generales->password=Crypt::encryptString($request->contraseña);
    $generales->asig_reg=auth()->user()->email;
    $generales->created_at_reg=auth()->user()->email;
    $generales->apell=$request->apellidos;
    $generales->email_registro=$request->correo;
    $generales->email_secund=$request->correo_secundario;
    $generales->tel_fij=$request->telefono_fijo;
    $generales->tel_mov=$request->telefono_movil;
    $generales->emp=$request->empresa;
  $generales->save();  

  $data=['nombre'=>$request->nombre];

  if($request->notificacion){
  Mail::to($request->correo)->send(new WelcomeMail($data));
  Mail::to($request->correo_secundario)->send(new WelcomeMail($data));
  
  }

//Realizar el registro de Credito 
 $credito = new Credito();
    $credito->dias=$request->dias;
    $credito->l_credito=$request->credito;
    $credito->user_id= $generales->id;
  $credito->save();   
//Realizar el registro de Facturacion con su ID del usuario
 $factura = new Factura();
    $factura->tip=$request->tipo;
    $factura->rfc=$request->rfc;
    $factura->r_social=$request->razon_social;
    $factura->calle=$request->calle;
    $factura->n_ext=$request->numero_exterior;
    $factura->n_int=$request->numero_interior;
    $factura->cp=$request->codigo_postal;
    $factura->col=$request->colonia;
    $factura->loc=$request->localidad;
    $factura->est=$request->estado;
    $factura->cd=$request->ciudad;
    $factura->tel1=$request->telefono1;
    $factura->tel2=$request->telefono2;
    $factura->notas=$request->notas;
    $factura->user_id= $generales->id;
  $factura->save(); 
//Realizar el registro de Directorios con su ID
$directorio = new Directorio();
$directorio->nom= $request->nombredir;
$directorio->puest= $request->puesto;
$directorio->correo= $request->correodir;
$directorio->tel= $request->telefonodir;
$directorio->user_id= $generales->id;
$directorio->save();

DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
 /* return $generales;
  return $credito;
  return $factura;
  return $directorio;*/  
  }


  //Traer registros de vehiculos y clientes
  public function get($sorter, $tableFilter, $columnFilter, $itemsLimit){
    $db=DB::table('vehiculos')
   // ->find('users.id','vehiculos.user_id')
   // ->findOrFail($id_user)
    ->leftjoin('users','users.id','vehiculos.user_id')
  
  //->where('users.id','vehiculos.user_id')
  ->whereNull('users.deleted_at')
    
    ->select('vehiculos.plac as placas','vehiculos.marc as marca','vehiculos.año');
      if( isset($columnFilter['placas']) ){
          $db->where('vehiculos.plac', 'like', '%' . $columnFilter['placas'] . 
          '%');
      }
      if( isset($columnFilter['marca']) ){
          $db->where('vehiculos.marc', 'like', '%' . $columnFilter['marca'] . '%');
      }
      if( isset($columnFilter['año']) ){
        $db->where('vehiculos.año', 'like', '%' . $columnFilter['año'] . '%');
    }
    if( strlen($tableFilter) > 0 ){
      $db->where(function ($query) use ($tableFilter) {
          $query->where('vehiculos.plac', 'like',                 '%' . $tableFilter . '%')
                ->orWhere('vehiculos.marc', 'like',              '%' . $tableFilter . '%') 
                ->orWhere('vehiculos.año', 'like',              '%' . $tableFilter . '%');                   
      });
    }
    if( !empty($sorter) ){
      if($sorter['asc'] === false){
          $sortCase = 'desc';
      }else{
          $sortCase = 'asc';
      }
      switch($sorter['column']){
        case 'placas':
          $db->orderBy('vehiculos.plac',$sortCase);
        break;
        case 'marca':
              $db->orderBy('vehiculos.marc',$sortCase);
        break;
        case 'año':
            $db->orderBy('vehiculos.año',$sortCase);
        break;
      }  

    
    }
    return $db->paginate($itemsLimit);
  }


  public function getFindOrFail($id_user,$relaciones) {
    return User::with($relaciones)->findOrFail($id_user);
  } 

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
  }

  public function getAllCache()
  {
  $generales = Users::where('tip_cliente','=','flotilla')->orwhere('tip_cliente','=','particular')->orderBy('tip_cliente', 'asc')->get();
  return $generales;
  }

}
 



