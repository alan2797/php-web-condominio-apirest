<?php

require_once '../Negocio/NComunicado.php';
//header('Accept: application/json');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: accept, content-type');
//header("Access-Control-Max-Age: 1728000");

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$titulo = $data['titulo'];
$descripcion = $data['descripcion'];
$fecha = $data['fecha'];
$hora = $data['hora'];
$tipo = $data['tipo'];
$importancia = $data['importancia'];

if (isset($titulo) && isset($descripcion) && isset($fecha) && isset($hora)
    && isset($tipo) && isset($importancia)) {

        if (registrarN($titulo,$descripcion,$fecha,$hora,$tipo,$importancia)) {
            echo json_encode(array(
                "response" => 1,
                "message" => "Se guardo correctamente el comunicado"
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


