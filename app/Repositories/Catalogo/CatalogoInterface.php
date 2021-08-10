<?php
namespace App\Repositories\Catalogo;

interface CatalogoInterface {
  public function get($sorter,$tableFilter,$columnFilter,$itemsLimit);
  public function store($request);
}