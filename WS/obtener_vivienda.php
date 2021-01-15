<?php

require_once '../Negocio/NVivienda.php';
//header('Accept: application/json');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: accept, content-type');
$id = filter_input(INPUT_GET, "id");

if (isset($id)) {
    $vivienda = getVivienda($id);
    if ($vivienda) {
        echo json_encode(array(
            "response" => 1,
            "data" => $vivienda
        ));
    } else {
        echo json_encode(array(
            "response" => 0,
            "message" => "Error al buscar la vivienda"
        ));
    }
} else {
    echo json_encode(array(
        "response" => -1,
        "message" => "No se recibio el parametro",
    ));
}


