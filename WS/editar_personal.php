<?php

require_once '../Negocio/NPersonal.php';
header('Accept: application/json');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: accept, content-type');
header("Access-Control-Max-Age: 1728000");

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$id = $data['id'];
$ci = $data['ci'];
$nombre = $data['nombre'];
$apellido = $data['apellido'];
$fecha_nac = $data['fecha_nac'];
$sexo = $data['sexo'];
$tipo = $data['tipo'];

if (isset($ci) && isset($nombre) && isset($apellido) && isset($fecha_nac)
    && isset($sexo) && isset($tipo) && isset($id)) {

        if (editar($ci,$nombre,$apellido,$fecha_nac,$sexo,$tipo,$id)) {
            echo json_encode(array(
                "response" => 1,
                "message" => "Se actualizo correctamente al personal"
            )); 
        } else {
            echo json_encode(array(
                "response" => 0,
                "message" => "Error al actualizar personal"
            ));
        }
        
} else {
    echo json_encode(array(
        "response" => -1,
        "message" => "No se recbieron los parametros correctos"
    ));
}


