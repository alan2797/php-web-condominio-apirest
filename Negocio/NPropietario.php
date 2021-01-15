<?php

require_once '../Datos/DPropietario.php';
require_once '../Datos/DUsuario.php';

function getPropietariosN() {
    $prop = new  DPropietario();
    return $prop->getPropietarios();
}

function registrarN($ci, $nombre, $apellido, $fecha_nac, $sexo, $tipo) {

    $user = new DUsuario($ci, $ci);
    $iduser = $user->registrar();
    $prop = new DPropietario($ci, $nombre, $apellido, $fecha_nac, $sexo, $tipo, $iduser);
    return $prop->registrar();   
}

function getPropietario($id) {
    $prop = new DPropietario();
    return $prop->getPropietario($id);
}

function editar($ci, $nombre, $apellido, $fecha_nac, $sexo, $tipo, $id) {
    $prop = new DPropietario($ci, $nombre, $apellido, $fecha_nac, $sexo, $tipo);
    return $prop->editar($id);   
}