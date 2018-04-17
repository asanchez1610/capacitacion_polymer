<?php

/** 
 Los headers permiten acceso desde otro dominio (CORS) 
 a nuestro REST API o desde un cliente remoto via HTTP
 **/
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, DELETE,PATCH');
header("Access-Control-Max-Age: 3600");
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Authorization, Origin, Accept, Access-Control-Request-Method, Access-Control-Request-Headers'); 

require '../repository/QueryProvider.php';


include_once '../config/Constantes.php';

require '../libs/Slim/Slim.php'; 
\Slim\Slim::registerAutoloader(); 
$app = new \Slim\Slim();

function getRepository(){
    $repository = new QueryProvider();
    return $repository;
}

function echoResponse($status_code, $response) {
    $app = \Slim\Slim::getInstance();
    // Http response code
    $app->status($status_code);
 
    // setting response content type to json
    $app->contentType('application/json');
 
    echo json_encode($response);
}

$app->get('/personas' , function() use ($app) {
    
    $response = array();
    $persona = $app->request->get('persona');
    $response["data"] = getRepository()->listarPersona( $persona );
    echoResponse(200, $response);
});


$app->post('/personas', function() use ($app) {
	$persona = $app->request->getBody();
	$param = json_decode($persona, true);
	$response["data"] = getRepository()->savePersona( $param );
    echoResponse(200, $response);
});

$app->post('/personas/:id', function($id) use ($app) {
	getRepository()->deletePersona( $id );
	$response["success"] = true;
    echoResponse(200, $response);
});


/* app start */
$app->run();
 

