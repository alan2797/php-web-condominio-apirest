<?php

//require_once '../Negocio/NEvento.php';
header('Accept: application/json');
header('Content-type: json/aplication');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: accept, content-type');

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$titulo = $data['titulo'];
$descripcion = $data['descripcion'];
$fecha = $data['fecha'];
$hora_inicio = $data['hora_inicio'];
$hora_fin = $data['hora_fin'];
$idusuario = $data['idusuario'];
if (isset($titulo) && isset($descripcion)) {
        $idpropietario = obtenerIdPropietarioN($idusuario);
        if (true) {
            echo json_encode(array(
                "response" => $idpropietario['idpropietario'],
                "message" => $idusuario
            )); 
        } else {
            echo json_encode(array(
                "response" => 0,
                "message" => "Error al guardar comunicado"
            ));
        }
        
} else {
    echo json_encode(array(
        "response" => -1,
        "message" => "No se recbieron los parametros correctos"
    ));
}
