<?php

require_once '../Datos/DAreaSocial.php';


function getAreasSociales() {
    $area = new DAreaSocial();
    return $area->getAreasSociales();
}

function registrar($nombre, $descripcion) {
    $area = new DAreaSocial($nombre, $descripcion);
    return $area->registrar();
}
