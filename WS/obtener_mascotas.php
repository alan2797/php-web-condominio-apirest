<?php

require_once '../Negocio/NMascota.php';
//header('Accept: application/json');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: accept, content-type');
$mascotas = getMascotas();
if ($mascotas) {
    echo json_encode(array(
        "response" => 1,
        "data" => $mascotas
    ));
} else {
    echo json_encode(array(
        "response" => 0,
        "data" => [],
        "message" => "Error al obtener los datos"
    ));
}


