<?php
namespace App\Repositories\Sucursal;

interface SucursalInterface {
  public function index($sorter, $tableFilter, $columnFilter, $itemsLimit);

  public function getCacheFindOrFail($request);
  public function getAllCache();

  public function store($request);
}