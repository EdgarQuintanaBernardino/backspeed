<?php
namespace App\Repositories\Cita;

interface CitaCacheInterface{  
  public function getFindOrFailCache($request);

  
}