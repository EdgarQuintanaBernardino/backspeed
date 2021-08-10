<?php
namespace App\Repositories\Cliente\General;

interface GeneralCacheInterface{  
  public function getFindOrFailCache($request);

  
}