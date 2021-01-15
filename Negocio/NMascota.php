<?php

require_once '../Datos/DMascota.php';

function getMascotas() {
    $mascota = new DMascota();
    return $mascota->getMascotas();
}

function registrar($nombre, $edad, $raza, $tipoanimal, $fkidpropietario) {
    $mascota = new DMascota($nombre, $edad, $raza, $tipoanimal, $fkidpropietario);
    return $mascota->registrar();
}