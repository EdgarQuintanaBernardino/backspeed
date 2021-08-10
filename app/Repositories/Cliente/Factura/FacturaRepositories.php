<?php
namespace App\Repositories\Cliente\Factura;
use App\Repositories\Cliente\Factura\FacturaInterface as FacturaInterface ;
use Illuminate\Support\Facades\DB;
use App\Models\Factura;
use App\Models\User;
use App\Repositories\Cliente\Factura\FacturaCacheRepositories;
use App\Events\layouts\ActividadesRegistradas;
use Illuminate\Support\Facades\Cache;


class FacturaRepositories implements FacturaInterface {
  protected $facturaCacheRepo;
  public function __construct(FacturaCacheRepositories $facturaCacheRepositories) {
    $this->facturaCacheRepo = $facturaCacheRepositories;
  } 

  public function store($request) {
    
    
    DB::beginTransaction();
try {
  $factura = new Factura();

    $factura->tip=$request->tipo;
    $factura->rfc=$request->rfc;
    $factura->r_social=$request->razon_social;
    $factura->calle=$request->calle;
    $factura->n_ext=$request->numero_exterior;
    $factura->n_int=40;
    $factura->cp=$request->codigo_postal;
    $factura->col=$request->colonia;
    $factura->loc=$request->localidad;
    $factura->est=$request->estado;
    $factura->cd=$request->ciudad;
    $factura->tel1=$request->telefono1;
    $factura->tel2=$request->telefono2;
    $factura->notas=$request->notas;
   

    $factura->save(); 
    
  DB::commit();
} catch (\Exception $e) {
  DB::rollback();
  return $e->getMessage();
}return $factura;
   
  }
  /*public function getAllCache()
  {
      $factura = Factura::where('tip')->get();
      return $factura;
  }*/

  public function getAllCache()
  {
  $factura = Factura::get();
  return $factura;
  }
  public function getFindOrFail($id, $relaciones) {
    return Factura::with($relaciones)->findOrFail($id);
    
  } 

  public function update($request,$id) {
   
    $factura           = $this->facturaCacheRepo->getFindOrFailCache($id);
   $factura->tip    = $request->tip;
    $factura->rfc    = $request->rfc;
    $factura->r_social  = $request->r_social;
    $factura->calle = $request->calle;
    $factura->n_ext  = $request->n_ext;
    $factura->n_int=$request->n_int;
    $factura->cp  = $request->cp;
    $factura->col  = $request->col;
    $factura->loc = $request->loc;
    $factura->est = $request->est;
    $factura->cd = $request->cd;
    $factura->tel1 = $request->tel1;
    $factura->tel2 = $request->tel2;
    $factura->notas = $request->notas;
  

    if($factura->isDirty()) {
      $info = (object) [
        'modulo'=>'Factura', 'modelo'=>'App\Models\Factura', 'ruta'=>'Detalles Factura', 'permisos'=>'factura.show,factura.edit', 'request'=>$factura,
        'campos'  => [
                        ['id','id'],
                        ['tip','Tipo de persona'],
                        ['rfc','RFC'],
                        ['r_social','Razón social'],
                        ['calle','Calle'],
                        ['n_ext', 'Número Ext.'],
                        ['cp', 'Código postal'],
                        ['col', 'Colonia'],
                        ['loc', 'Localidad'],
                        ['est', 'Estado'],
                        ['cd', 'Ciudad'],
                        ['tel1', 'Teléfono 1'],
                        ['tel2', 'Teléfono 2'],
                        ['notas', 'Notas']
                      ]];
      // Dispara el evento registrado en App\Providers\EventServiceProvider.php 
      ActividadesRegistradas::dispatch($info); 
    //$factura->updated_at_reg  = auth()->user()->email_registro;
    }
    $factura->save();
    return $factura;
  }
} 