<?php

require_once '../Negocio/NPersonal.php';
//header('Accept: application/json');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: accept, content-type');
$id = filter_input(INPUT_GET, "id");

if (isset($id)) {
    $personal = getPersonal($id);
    //var_dump($personal);
    if ($personal) {
        echo json_encode(array(
            "response" => 1,
            "data" => $personal
        ));
    } else {
        echo json_encode(array(
            "response" => 0,
            "message" => "No existe el personal"
        ));
    }
} else {
    echo json_encode(array(
        "response" => -1,
        "message" => "No se recibio el parametro",
    ));
}


