<?php
namespace App\Repositories\Cliente\Credito;

interface CreditoInterface {
 //metodo para realizar un nuevo registro
  public function store($request);
  public function getFindOrFail($id_credito, $relaciones);
  public function update($request, $id_credito);
}