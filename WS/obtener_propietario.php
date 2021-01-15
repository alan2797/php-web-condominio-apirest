<?php

require_once '../Negocio/NPropietario.php';
//header('Accept: application/json');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: accept, content-type');
$id = filter_input(INPUT_GET, "id");

if (isset($id)) {
    $propietario = getPropietario($id);
    if ($propietario) {
        echo json_encode(array(
            "response" => 1,
            "data" => $propietario
        ));
    }
} else {
    echo json_encode(array(
        "response" => -1,
        "message" => "No se recibio el parametro",
    ));
}


