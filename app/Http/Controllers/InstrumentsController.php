<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
 use Auth;

use App\Libraries\AuthRailsApi;
class InstrumentsController extends Controller
{

	public function index(Request $request)
    {

    	if(Auth::check()) {
	        $user_backend =  Auth::user()->toArray();
	    	$app ="ffi_test";
	    	$nit = $request->input('nit');
	    	$backend_Token = AuthRailsApi::get_backend_token();//autenticar aplicacion con API rails
	    	$user_data =json_decode( AuthRailsApi::get_user_data($nit , $app));//Obtenemos credenciales del usuario logeado
	    	if($user_data==null && $nit!=null){//si el usuario no existe en la api, pero tenemos su NIT lo creamos en la api
	            if ($user_backend["email"] ) {
	             $user_data =  json_decode(AuthRailsApi::create_user_api($nit, $app, $user_backend["email"]));       //crear usuario en api, luego cargar user data
	            }  
	        }
			if($user_data){
				 $user_backend["auth_token"] = $user_data->auth_token;
				 $user_backend["api_data"] =$user_data;
				 $user_backend["id_api"] = $user_data->id;
				 $user_backend["app_id"] = $app;
			}
	       
	        $user_backend["nit"] = $nit;
	        
	      //  $user_backend["empresa"] = $user->nombre;

    	//pasar nit, auth token para crear u obtener una empresa de la api.

    	//añadir datos
    	$user = null;

             
	    }
        return view('instruments.index', [
         'user' => $user_backend 
        ]);
       
    }
}
