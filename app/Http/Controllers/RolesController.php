<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\Menurole;
use App\Models\RoleHierarchy;
use App\Models\Rol;
use App\Repositories\Rol\RolRepositories;
use App\Http\Requests\Rol\StoreRolRequest;

class RolesController extends Controller
{
    protected $rolRepo;
    public function __construct(RolRepositories $rolRepositories) {
      $this->rolRepo    = $rolRepositories;
    }


    public function getAllCache(){
        $rol=$this->rolRepo->getAllCache();
        return response()->json($rol);
      }
      
    public function getAll(){
      $rol=$this->rolRepo->getAll();
      return response()->json($rol);
    }
      public function store(StoreRolRequest $request) {
        $rol= $this->rolRepo->store($request);
        return response()->json([$rol->id],200);
      }

    public function index()
    {
      /*  $roles = DB::table('roles')
        ->leftJoin('role_hierarchy', 'roles.id', '=', 'role_hierarchy.role_id')
        ->select('roles.*', 'role_hierarchy.hierarchy')
        ->orderBy('hierarchy', 'asc')
        ->get();
        return response()->json( $roles );*/
      
        $roles= DB::table('roles')
        ->select('id','nom')
        ->whereNull('deleted_at')
        ->get();
        return response()->json($roles);
    }




    public function delete(Request $request)
    {
       /* $role = Role::where('id', '=', $id)->first();
        $roleHierarchy = RoleHierarchy::where('role_id', '=', $id)->first();
        $menuRole = Menurole::where('role_name', '=', $role->name)->first();
        if(!empty($menuRole)){
            return response()->json( ['status' => 'rejected'] );
        }else{
            $role->delete();
            $roleHierarchy->delete();
            return response()->json( ['status' => 'success'] );
        }*/
        $rol = Rol::find($request->id);
        $rol->delete();
        return response()->json( ['status' => 'success'] );
    }
}
