<?php

require_once '../Negocio/NMascota.php';
//header('Accept: application/json');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: accept, content-type');
//header("Access-Control-Max-Age: 1728000");

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$nombre = $data['nombre'];
$edad = $data['edad'];
$raza = $data['raza'];
$tipoanimal = $data['tipoanimal'];
$fkidpropietario = $data['fkidpropietario'];

if (isset($nombre) && isset($edad) && isset($raza) && isset($tipoanimal) && isset($fkidpropietario)) {

        if (registrar($nombre,$edad,$raza,$tipoanimal,$fkidpropietario)) {
            echo json_encode(array(
                "response" => 1,
                "message" => "Se guardo correctamente la mascota"
            )); 
        } else {
            echo json_encode(array(
                "response" => 0,
                "message" => "Error al guardar mascota"
            ));
        }
        
} else {
    echo json_encode(array(
        "response" => -1,
        "message" => "No se recbieron los parametros correctos"
    ));
}


