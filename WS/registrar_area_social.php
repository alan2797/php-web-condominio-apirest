<?php

require_once '../Negocio/NAreaSocial.php';
//header('Accept: application/json');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: accept, content-type');
//header("Access-Control-Max-Age: 1728000");

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$nombre = $data['nombre'];
$descripcion = $data['descripcion'];

if (isset($nombre) && isset($descripcion)) {

        if (registrar($nombre, $descripcion)) {
            echo json_encode(array(
                "response" => 1,
                "message" => "Se guardo correctamente el area social"
            )); 
        } else {
            echo json_encode(array(
                "response" => 0,
                "message" => "Error al guardar area social"
            ));
        }
        
} else {
    echo json_encode(array(
        "response" => -1,
        "message" => "No se recbieron los parametros correctos"
    ));
}


