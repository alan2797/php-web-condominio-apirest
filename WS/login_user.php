<?php

require_once '../Negocio/NUsuario.php';
//header('Accept: application/json');
header('Content-type: application/json');
/*header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: accept, content-type');
*/

$json = file_get_contents('php://input');
$data = json_decode($json, true);
//echo $json;
$login = $data['login'];
$contrasenia = $data['contrasenia'];

if (isset($login) && isset($contrasenia)) {
    $result = loginN($login, $contrasenia);
    if ($result) {
        echo json_encode(array(
            "response" => 1,
            "message" => "Usuario correcto",
            "user" => $result
        ));
    } else {
        echo json_encode(array(
            "response" => 0,
            "message" => "Usuario o contrasenia incorrectos"
        ));
    }
} else {
    echo json_encode(array(
        "response" => -1,
        "message" => "No se recibieron los parametros correctos"
    ));
}

