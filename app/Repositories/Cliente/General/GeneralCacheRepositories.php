<?php
namespace App\Repositories\Cliente\General;
// Models
use App\Models\User;
// Otros
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Repositories\Cliente\General\GeneralCacheInterface as GeneralCacheInterface ;

class GeneralCacheRepositories implements GeneralCacheInterface {
  public function getFindOrFailCache($id_user) {
    $generales = Cache::rememberForever('users-'.$id_user, function() use($id_user){
      return User::findOrFail($id_user);
    });
    
    return $generales;
  }
}