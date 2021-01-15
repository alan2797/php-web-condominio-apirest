<?php

require_once '../Negocio/NAreaSocial.php';
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: accept, content-type');
$areas_sociales = getAreasSociales();

echo json_encode(array(
    "response" => 1,
    "data" => $areas_sociales
));

