<?php
namespace App\Http\Controllers\Encuesta;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;
// Repositories
use App\Repositories\Encuesta\EncuestaRepositories;
//Models
use App\Models\Encuesta;

class EncuestaController extends Controller {
  protected $EncuestaRepo;
  public function __construct(EncuestaRepositories $EncuestaRepositories) {
    $this->EncuestaRepo = $EncuestaRepositories;
  }

  public function store(Request $request) {
    $encuesta = $this->EncuestaRepo->store($request);
    return response()->json([$encuesta], 200);    
  }
 
}

