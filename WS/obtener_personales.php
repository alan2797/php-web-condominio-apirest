<?php

require_once '../Negocio/NPersonal.php';
//header('Accept: application/json');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: accept, content-type');
$personales = getAdministrativos();

if ($personales) {
    echo json_encode(array(
        "response" => 1,
        "data" => $personales
    ));
} else {
    echo json_encode(array(
        "response" => 0,
        "data" => [],
        "message" => "No hay datos"
    ));
}


