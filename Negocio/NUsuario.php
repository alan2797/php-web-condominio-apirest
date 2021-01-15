<?php

require_once '../Datos/DUsuario.php';

function loginN($login , $contrasenia) {
    $user = new DUsuario($login, $contrasenia);
    return $user->login();
}

function registrarTokenN($token, $idusuario) {
    $user = new DUsuario();
    $user->setToken($token);
    return $user->registrarToken($idusuario);
    //$user->setIdusuario
}