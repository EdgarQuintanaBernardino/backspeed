<?php
use App\Mail\NotifiMail;
use App\Mail\CotiMail;
use App\Mail\ConfirCitaMail;
use App\Mail\CitaMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Whatsapp\WhatsappController;
use App\Http\Controllers\PruebaController;



Route::group(['middleware' => 'api'], function ($router) {

  
  require_once __DIR__ . '/public/publicRoutes.php';

  Route::group(['middleware' =>'admin'], function ($router) {


    Route::post('autenticado',  'AuthController@getAutenticado')->name('autenticado');
    require_once __DIR__ . '/sistema/sistemaRoutes.php';

    Route::group(['prefix' => 'sucursal'], function() {
      require_once __DIR__ . '/sucursal/sucursalRoutes.php';
    });
//Rutas para la vista de nuevo cliente
    Route::group(['prefix' => 'directorio'], function() {
      require_once __DIR__ . '/cliente/directorioRoutes.php';
    });

    Route::group(['prefix' => 'general'], function() {
      require_once __DIR__ . '/cliente/generalRoutes.php';
    });
    Route::group(['prefix' => 'empresa'], function() {
      require_once __DIR__ . '/cliente/empresaRoutes.php';
    });

    Route::group(['prefix' => 'credito'], function() {
      require_once __DIR__ . '/cliente/creditoRoutes.php';
    });
    Route::group(['prefix' => 'factura'], function() {
      require_once __DIR__ . '/cliente/facturaRoutes.php';
    });
//Ruta para la vista nuevo vehiculo
    Route::group(['prefix' => 'vehiculo'], function() {
       require_once __DIR__ . '/vehiculo/vehiculoRoutes.php';
    });
//Ruta para la vista Cita
    Route::group(['prefix' => 'cita'], function() {
      require_once __DIR__ . '/cita/citaRoutes.php';
   });
  Route::group(['prefix' => 'confirmadas'], function() {
    require_once __DIR__ . '/cita/confirmadasRoutes.php';
 });
 Route::group(['prefix' => 'sinconfirmar'], function() {
  require_once __DIR__ . '/cita/sinconfirmarRoutes.php';
});
Route::group(['prefix' => 'citapasada'], function() {
  require_once __DIR__ . '/cita/citapasadaRoutes.php';
});
   //Ruta para la vista Recordatorio
   Route::group(['prefix' => 'recordatorio'], function() {
    require_once __DIR__ . '/recordatorio/recordatorioRoutes.php';
 });

//Ruta Cotizacion
Route::group(['prefix' => 'cotizacion'], function() {
  require_once __DIR__ . '/cotizacion/cotizacionRoutes.php';
});
//Ruta Mano Obra
Route::group(['prefix' => 'mano_obra'], function() {
  require_once __DIR__ . '/cotizacion/mobraRoutes.php';
});


    Route::group(['prefix' => 'perfil'], function() {
      require_once __DIR__ . '/perfil/perfilRoutes.php';
    });

    Route::group(['prefix' => 'usuario'], function() {
      require_once __DIR__ . '/usuario/usuarioRoutes.php';
    });
    Route::group(['prefix' => 'usuarioReg'], function() {
      require_once __DIR__ . '/usuario/usuarioRegRoutes.php';
    });

    Route::group(['prefix' => 'usuariov'], function() {
      require_once __DIR__ . '/clientevehiculo/clientevehiculoRoutes.php';
    });
    Route::group(['prefix' => 'flotillav'], function() {
      require_once __DIR__ . '/clientevehiculo/flotillavehiculoRoutes.php';
    });
    
    Route::group(['prefix' => 'clientesT'], function() {
      require_once __DIR__ . '/clientevehiculo/todosRoutes.php';
    });
    Route::group(['prefix' => 'rol'], function() {
      require_once __DIR__ . '/roles/rolesRoutes.php';
    });

    Route::group(['prefix' => 'colaborador'], function() {
      require_once __DIR__ . '/colaborador/colaboradorRoutes.php';
    });

    Route::group(['prefix' => 'recepcion'], function() {
      require_once __DIR__ . '/recepcion/recepcionRoutes.php';
    });
    
    Route::group(['prefix' => 'diagnostico'], function() {
      require_once __DIR__ . '/diagnostico/diagnosticoRoutes.php';
    });
    Route::group(['prefix' => 'encuesta'], function() {
      require_once __DIR__ . '/encuesta/encuestaRoutes.php';
    });

    Route::resource('roles',               'RolesController');
    Route::get('/move/move-up',      'RolesController@moveUp')->name('roles.up');
    Route::get('/move/move-down',    'RolesController@moveDown')->name('roles.down');
    Route::post('/roles/getAllCache', 'RolesController@getAllCache')->name('roles.getAllCache');
    Route::get('/', 'RolesController@index')->name('roles.index');
    Route::get('/create',   'RolesController@create')->name('roles.create');
    Route::post('/store',   'RolesController@store')->name('roles.store');
    Route::post('delete/{id}','RolesController@delete')->name('roles.delete');    
    Route::resource('users', 'UsersController')->except( ['create', 'store'] );

    Route::group(['prefix' => 'catalogo'], function() {
      require_once __DIR__ . '/catalogo/catalogoRoutes.php';
    });


			/*
        Route::resource('mail',        'MailController');
        Route::get('prepareSend/{id}', 'MailController@prepareSend')->name('prepareSend');
        Route::post('mailSend/{id}',   'MailController@send')->name('mailSend');
        Route::resource('bread',  'BreadController');   //create BREAD (resource)
        Route::get('menu/edit', 'MenuEditController@index');
        Route::get('menu/edit/selected', 'MenuEditController@menuSelected');
        Route::get('menu/edit/selected/switch', 'MenuEditController@switch');
        Route::prefix('menu/menu')->group(function () { 
            Route::get('/',         'MenuEditController@index')->name('menu.menu.index');
            Route::get('/create',   'MenuEditController@create')->name('menu.menu.create');
            Route::post('/store',   'MenuEditController@store')->name('menu.menu.store');
            Route::get('/edit',     'MenuEditController@edit')->name('menu.menu.edit');
            Route::post('/update',  'MenuEditController@update')->name('menu.menu.update');
            Route::get('/delete',   'MenuEditController@delete')->name('menu.menu.delete');
        });
        Route::prefix('menu/element')->group(function () { 
            Route::get('/',             'MenuElementController@index')->name('menu.index');
            Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
            Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
            Route::get('/create',       'MenuElementController@create')->name('menu.create');
            Route::post('/store',       'MenuElementController@store')->name('menu.store');
            Route::get('/get-parents',  'MenuElementController@getParents');
            Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
            Route::post('/update',      'MenuElementController@update')->name('menu.update');
            Route::get('/show',         'MenuElementController@show')->name('menu.show');
            Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
        });
        Route::prefix('media')->group(function ($router) {
            Route::get('/',                 'MediaController@index')->name('media.folder.index');
            Route::get('/folder/store',     'MediaController@folderAdd')->name('media.folder.add');
            Route::post('/folder/update',   'MediaController@folderUpdate')->name('media.folder.update');
            Route::get('/folder',           'MediaController@folder')->name('media.folder');
            Route::post('/folder/move',     'MediaController@folderMove')->name('media.folder.move');
            Route::post('/folder/delete',   'MediaController@folderDelete')->name('media.folder.delete');;

            Route::post('/file/store',      'MediaController@fileAdd')->name('media.file.add');
            Route::get('/file',             'MediaController@file');
            Route::post('/file/delete',     'MediaController@fileDelete')->name('media.file.delete');
            Route::post('/file/update',     'MediaController@fileUpdate')->name('media.file.update');
            Route::post('/file/move',       'MediaController@fileMove')->name('media.file.move');
            Route::post('/file/cropp',      'MediaController@cropp');
            Route::get('/file/copy',        'MediaController@fileCopy')->name('media.file.copy');

            Route::get('/file/download',    'MediaController@fileDownload');
        });
			*/


Route::get('/messages', function(Request $request) {
 
  $url = "https://messages-sandbox.nexmo.com/v0.1/messages";
  $params = ["to" => ["type" => "whatsapp", "number" => "525579078189"],
      "from" => ["type" => "whatsapp", "number" => "525567093315"],
      "message" => [
          "content" => [
              "type" => "text",
              "text" => "Confirmacion de cita"
          ]
      ]
  ];
  $headers = ["Authorization" => "Basic " .base64_encode(env('NEXMO_API_KEY') . ":" . env('NEXMO_API_SECRET'))];

  $client = new \GuzzleHttp\Client();
  $response = $client->request('POST', $url, ["headers" => $headers, "json" => $params]);
  $data = $response->getBody();
  Log::Info($data);

  return view('thanks');
});


    

});
  Route::get('waping/send','WhatsappController@send');


    Route::get('bienvenida',function(){
      $correo=new NotifiMail;
      Mail::to('desarrollospeed12@gmail.com')->send($correo);
      return "mensaje enviado";
      });
      Route::get('cotizacion',function(){
        $correo=new CotiMail;
        Mail::to('desarrollospeed12@0 .com')->send($correo);
        return "cotizacion enviada";

      });
        Route::get('noticita',function(){
          $correo=new ConfirCitaMail;
          Mail::to('desarrollospeed12@gmail.com')->send($correo);
          return "confirmacion enviada";
          });
          Route::get('cita',function(){
            $correo=new CitaMail;
            Mail::to('desarrollospeed12@gmail.com')->send($correo);
            return "cita enviada";
            });


          Route::get('send-email', [PruebaController::class, 'sendMailWithPDF']);
          


      
    

//wHATSAAP//
    
//Route::post('lazyTable', 'LazyTableController@index');
});
