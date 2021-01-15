<?php

require_once '../Negocio/NPropietario.php';
//header('Accept: application/json');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: accept, content-type');
$propietarios = getPropietariosN();

echo json_encode(array(
    "response" => 1,
    "data" => $propietarios
));

