<?php

require_once '../Datos/DVivienda.php';

function getViviendas() {
    $vivi = new DVivienda();
    return $vivi->getViviendas();
}

function registrar($nro_vivienda, $calle, $fkidpropietario) {
    $vivi = new DVivienda($nro_vivienda, $calle, $fkidpropietario);
    return $vivi->registrar();
}

function getVivienda($id) {
    $vivi = new DVivienda();
    return $vivi->getVivienda($id);
}