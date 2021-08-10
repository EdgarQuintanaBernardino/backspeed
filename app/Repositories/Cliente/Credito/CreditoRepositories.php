<?php
namespace App\Repositories\Cliente\Credito;
use App\Repositories\Cliente\Credito\CreditoInterface as CreditoInterface;
use Illuminate\Support\Facades\DB;
use App\Repositories\Cliente\Credito\CreditoCacheRepositories;
use App\Models\Credito;
use App\Models\User;
use App\Events\layouts\ActividadesRegistradas;
use Illuminate\Support\Facades\Cache;

class CreditoRepositories implements CreditoInterface{

  protected $creditoCacheRepo;
  public function __construct(CreditoCacheRepositories $creditoCacheRepositories) {
    $this->creditoCacheRepo = $creditoCacheRepositories;
  } 
  
 public function store($request) {
  //Se trae el modelo credito para poder realizar en nuevo registro 
  DB::beginTransaction();
try {
  $credito = new Credito();
    $credito->dias=$request->dias;
    $credito->l_credito=$request->credito;
    
    $credito->save();
    

  DB::commit();
} catch (\Exception $e) {
  DB::rollback();
  return $e->getMessage();
} 
return $credito; 
      
  }

  public function getFindOrFail($id_credito, $relaciones) {
    return Credito::with($relaciones)->findOrFail($id_credito);
    
  } 

  public function update($request,$id_credito) {
    $credito           = $this->creditoCacheRepo->getFindOrFailCache($id_credito);
   $credito->dias    = $request->dias;
    $credito->l_credito    = $request->l_credito;
    
    if($credito->isDirty()) {
      $info = (object) [
        'modulo'=>'Credito', 'modelo'=>'App\Models\Credito', 'ruta'=>'Detalles Cliente', 'permisos'=>'credito.show,credito.edit', 'request'=>$credito,
        'campos'  => [
                        ['dias','Dias'],
                        ['l_credito','Limite Credito'],
                      ]];
      // Dispara el evento registrado en App\Providers\EventServiceProvider.php 
      ActividadesRegistradas::dispatch($info); 
    }
    $credito->save();
  
    return $credito;
  }




}