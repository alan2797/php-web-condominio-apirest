<?php

require_once '../Negocio/NUsuario.php';
header('Accept: application/json');
header('Content-type: json/aplication');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: accept, content-type');

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$token = $data['token'];
$idusuario = $data['idusuario'];

if (isset($token) && isset($idusuario)) {
    if (registrarTokenN($token, $idusuario)) {
        echo json_encode(array(
            "response" => 1,
            "message" => "Se registro el token"
        ));
    } else {
        echo json_encode(array(
            "response" => 0,
            "message" => "No se registro el token"
        ));
    }
} else {
    echo json_encode(array(
        "response" => -1,
        "message" => "No se recibieron los parametros correspondientes"
    ));
}

