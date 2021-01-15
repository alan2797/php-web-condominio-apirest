<?php

require_once '../conexion/Conexion.php';
class DInvitado {
    
    private $nombre;
    private $apellido;
    private $edad;
    private $codigo_qr;
    private $fkidpropietario;
    private $fkidevento;
    
    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getEdad() {
        return $this->edad;
    }

    function getCodigo_qr() {
        return $this->codigo_qr;
    }

    function getFkidpropietario() {
        return $this->fkidpropietario;
    }

    function getFkidevento() {
        return $this->fkidevento;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setCodigo_qr($codigo_qr) {
        $this->codigo_qr = $codigo_qr;
    }

    function setFkidpropietario($fkidpropietario) {
        $this->fkidpropietario = $fkidpropietario;
    }

    function setFkidevento($fkidevento) {
        $this->fkidevento = $fkidevento;
    }


}
