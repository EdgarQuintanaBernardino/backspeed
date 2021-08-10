<?php
namespace App\Http\Controllers\Diagnostico;
use App\Http\Controllers\Controller;
// Request
use Illuminate\Http\Request;
use App\Http\Requests\Diagnostico\StoreDiagnosticoRequest;
// Repositories
use App\Repositories\Diagnostico\DiagnosticoRepositories;
//Models
use App\Models\Diagnostico;

class DiagnosticoController extends Controller {
  protected $diagnosticoRepo;
  public function __construct(DiagnosticoRepositories $diagnosticoRepositories) {
    $this->diagnosticoRepo = $diagnosticoRepositories;
  }

  public function store(Request $request) {
    $diagnostico = $this->diagnosticoRepo->store($request);
    return response()->json([$diagnostico->id], 200);    
  }
 
}

