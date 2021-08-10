<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehiculo;
use App\Models\Directorio;
use App\Models\Credito;
use App\Models\Factura;

use App\Repositories\Cliente\Cliente_Registrado\ClienteRRepositories;


class UsersController extends Controller
{
    //Constructor para traer a nuestro repositorio
    protected $clienteRepo;
    
    public function __construct(ClienteRRepositories $clienteRepositories) {
      $this->clienteRepo    = $clienteRepositories;
    
      $this->middleware('auth:api');
    }

  




  /*  public function index()
    {
        $you = auth()->user()->id;
        $users = DB::table('users')
        ->select('users.id', 'users.name', 'users.email', 'users.menuroles as roles', 'users.email_verified_at as registered')
        ->whereNull('deleted_at')
        ->get();
        return response()->json( compact('users', 'you') );
    }*/

   
    public function show($id)
    {
        $user = DB::table('users')
        ->select('users.id', 'users.name', 'users.email', 'users.menuroles as roles', 'users.status', 'users.email_verified_at as registered')
        ->where('users.id', '=', $id)
        ->first();
        return response()->json( $user );
    }

    
    public function edit($id)
    {
        $user = DB::table('users')
        ->select('users.id','users.name','users.email')
        ->where('users.id','=',$id)
        ->first();
        return response()->json($user);
    }

    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'       => 'required|min:1|max:256',
            'email'      => 'required|email|max:256'
        ]);
        $user = User::find($id);
        $user->name       = $request->input('name');
        $user->email      = $request->input('email');
        $user->save();
        return response()->json( ['status' => 'success'] );
    }

   //eliminar un usuario
   /* public function delete($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();   
        }
        return response()->json( ['status' => 'success'] );
    }*/


    /*
    
    select onchange
    input {{vehiculo.mod}}
    */
    public function delete(Request $request){
   $credito = Credito::where('user_id', $request->user_id)->delete(); 
   $factura = Factura::where('user_id', $request->user_id)->delete();     
   $Directorio = Directorio::where('user_id', $request->user_id)->delete(); 
   $user = User::find($request->id);
   $user->delete();
   return response()->json( ['status' => 'success'] );
}
    //Trae datos del cliente para nuestro multiselect 
    public function getAllCache(){
        $cliente=$this->clienteRepo->getAllCache();
        return response()->json($cliente);
      }

      public function get($id)
      {
          $todos=DB::table('user_vehiculo')
      ->rightjoin('users','users.id','user_vehiculo.user_id')
      ->leftjoin('vehiculos','vehiculos.id','user_vehiculo.vehiculo_id')
      ->where('users.id', '=', $id)
          ->first();
          return response()->json( $todos);
      }

}


