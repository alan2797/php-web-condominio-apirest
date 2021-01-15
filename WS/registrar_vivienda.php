<?php

require_once '../Negocio/NVivienda.php';
//header('Accept: application/json');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: accept, content-type');
//header("Access-Control-Max-Age: 1728000");

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$nro_vivienda = $data['nro_vivienda'];
$calle = $data['calle'];
$fkidpropietario = $data['fkidpropietario'];

if (isset($nro_vivienda) && isset($calle) && isset($fkidpropietario)) {

        if (registrar($nro_vivienda,$calle,$fkidpropietario)) {
            echo json_encode(array(
                "response" => 1,
                "message" => "Se guardo correctamente la vivienda"
            )); 
        } else {
            echo json_encode(array(
                "response" => 0,
                "message" => "Error al guardar vivienda"
            ));
        }
        
} else {
    echo json_encode(array(
        "response" => -1,
        "message" => "No se recbieron los parametros correctos"
    ));
}


