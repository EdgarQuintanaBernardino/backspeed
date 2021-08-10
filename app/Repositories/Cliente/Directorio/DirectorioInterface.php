<?php
namespace App\Repositories\Cliente\Directorio;

interface DirectorioInterface {
  //Trae todos los datos de manera filtrada
  public function get($sorter, $tableFilter, $columnFilter, $itemsLimit);
  //Realiza el registro de un nuevo directorio
  public function store($request);
}