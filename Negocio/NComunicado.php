<?php

require_once '../Datos/DComunicado.php';
require_once '../Datos/DUsuario.php';
require_once __DIR__ . '/FCM.php';

function getAllN() {
    $com = new DComunicado();
    return $com->getAll();
}
/*
function registrarN($titulo, $descripcion, $fecha, $hora, $tipo, $importancia) {
    $com = new DComunicado($titulo, $descripcion, $fecha, $hora, $tipo, $importancia);
    return $com->registrar();
}
*/
function registrarN($titulo, $descripcion, $fecha, $hora, $tipo, $importancia) {
    $com = new DComunicado($titulo, $descripcion, $fecha, $hora, $tipo, $importancia);
    if ($com->registrar()) {
        $user = new DUsuario();
        $users = $user->getUsuarios();
        foreach ($users as $row) {
            sendFCMNotification($row['token'], $titulo);
        }
        return true;
    } else {
        return false;
    }
}

function enviarComunicados($ids) {
    
}
