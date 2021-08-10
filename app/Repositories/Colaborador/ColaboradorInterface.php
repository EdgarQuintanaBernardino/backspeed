<?php
namespace App\Repositories\Colaborador;
interface ColaboradorInterface {
 // public function get($sorter, $tableFilter, $columnFilter, $itemsLimit);
  public function store($request);
  public function get( $sorter, $tableFilter, $columnFilter, $itemsLimit );
  public function getAllCache();
}