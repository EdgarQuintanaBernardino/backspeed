<?php
namespace App\Repositories\Rol;

interface RolInterface {
 
  public function getAllCache();
  public function store($request);
  public function getAll();
}