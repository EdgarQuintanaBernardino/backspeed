<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GuzzleHttp;
use Storage;
class WhatsappController extends Controller { 
    public function send(){
       $json=[
           'token'=>'1fa27713542ac1ba926ff79f59d56820',
           'source'=>525567093315,
           'destination'=>525579078189,
           'type'=>'text',
           'body'=>[
            'text'=>'Bienvenido a Speed Pro'
           ]
        ];
 $client =new GuzzleHttp\Client();
  $response=$client->request('POST','http://waping.es/api/send',
  ['headers'=>['Content-Type'=>'application/json'],
    'json'=>$json
  ]                                                                                                 
   
);
echo $response->getStatusCode();
echo $response->getBody();
return $json;
    }
}
