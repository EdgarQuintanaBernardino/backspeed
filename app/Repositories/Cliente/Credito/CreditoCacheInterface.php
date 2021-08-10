<?php
namespace App\Repositories\Cliente\Credito;

interface CreditoCacheInterface{  
  public function getFindOrFailCache($request);

  
}