<?php

require_once '../Negocio/NEvento.php';
//header('Accept: application/json');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: accept, content-type');
$eventos = getEventos();
//var_dump($eventos);
if ($eventos) {
    echo json_encode(array(
        "response" => 1,
        "data" => $eventos
    ));
} else {
    echo json_encode(array(
        "response" => 0,
        "data" => [],
        "message" => "Error al obtener los datos"
    ));
}


