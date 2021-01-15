<?php 

require_once '../Datos/DPersonal.php';
require_once '../Datos/DUsuario.php';

function getAdministrativos() {
    $per = new DPersonal();
    return $per->getAdministrativos();
}

function registrar($ci, $nombre, $apellido, $fecha_nac, $sexo, $tipo) {
    $user = new DUsuario($ci, $ci);
    $iduser = $user->registrar();
    $prop = new DPersonal($ci, $nombre, $apellido, $fecha_nac, $sexo, $tipo, $iduser);
    return $prop->registrar();
}

function getPersonal($id) {
    $per = new DPersonal();
    return $per->getPersonal($id);
}

function editar($ci, $nombre, $apellido, $fecha_nac, $sexo, $tipo, $id) {
    $prop = new DPersonal($ci, $nombre, $apellido, $fecha_nac, $sexo, $tipo);
    return $prop->editar($id);   
}