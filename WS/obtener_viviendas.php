<?php

require_once '../Negocio/NVivienda.php';
//header('Accept: application/json');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: accept, content-type');
$viviendas = getViviendas();
if ($viviendas) {
    echo json_encode(array(
        "response" => 1,
        "data" => $viviendas
    ));
} else {
    echo json_encode(array(
        "response" => 0,
        "data" => [],
        "message" => "Error al obtener los datos"
    ));
}


