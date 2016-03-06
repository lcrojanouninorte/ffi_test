<?php
 

function get_backend_token(){
 
$url = 'http://localhost:3002/registered_apps/signin';
 
$fields = array(
	    'email'=>'lcrojano@gmail.com',
	    'password'=>'23veces23'
	);
$session =  array('session'=> $fields );
$data = json_encode($session);
$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
 
$result = json_decode(curl_exec($ch));
 
curl_close($ch);

$backend_token = (isset($result->registered_app->auth_token))?$result->registered_app->auth_token:null;
return $backend_token;
//TODO: verificar casos en que la contraseña o usuario este errado.
 
	//TODO: verificar casos en que la contraseña o usuario este errado.
}

public static function get_user_data($nit, $app_id)
{


$url = 'http://localhost:3002/users/get_user_token';
 
$fields = array(
	    'nit'=>$nit,
	    'app_id'=>$app_id
	);

$data = json_encode($fields);
$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json'
)); 
 
$result =json_decode( curl_exec($ch));
 //TODO: verificar casos en que la contraseña o usuario este errado.
curl_close($ch);

//$backend_token = $result->user->auth_token;
if(isset($result->user)){
	return json_encode(	$result->user);
}else{
	return  null;
}



}


function create_user_api($nit, $app_id, $email)
{


$url = 'http://localhost:3002/users/signup';

$password = randomPassword() ;

$fields = array(
	    'nit'=>$nit,
	    'password'=>$password,
	    'password_confirmation'=>$password,
	    'app_id'=>$app_id,
	    'email'=>$email
	);

$data = json_encode($fields);
$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json'
)); 
 
$result =json_decode( curl_exec($ch));
 //TODO: verificar casos en que la contraseña o usuario este errado.
curl_close($ch);

//$backend_token = $result->user->auth_token;
return json_encode(	$result) ;
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>