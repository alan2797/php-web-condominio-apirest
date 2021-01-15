<?php

require_once '../Datos/DEvento.php';
//require_once '../Datos/DUsuario.php';
//require_once __DIR__ . '/FCM.php';

function getEventos() {
    $eve = new DEvento();
    return $eve->getEventos();
}

function registrarEventoN($titulo, $descripcion, $fecha, $hora_inicio, $hora_fin, $idpropietario) {
    $com = new DEvento();
    if ($com->registrarEvento($titulo, $descripcion, $fecha, $hora_inicio, $hora_fin, $idpropietario)) {
        return true;
    } else {
        return false;
    }
}
function obtenerIdPropietarioN($idusuario){
    $evento = new DEvento();
    return $evento->obtenerIdPropietario($idusuario);
}
