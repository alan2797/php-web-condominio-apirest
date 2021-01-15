<?php

require_once '../Negocio/NComunicado.php';
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: accept, content-type');
$comunicados = getAllN();

echo json_encode(array(
    "response" => 1,
    "data" => $comunicados
));

