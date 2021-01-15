<?php

require_once 'Conexion.php';

class DAreaSocial {

    private $nombre;
    private $descripcion;

    public function __construct($nombre = null, $descripcion = null) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    public function getAreasSociales() {

        $sql = "SELECT * FROM areasocial";
        $stmt = Conexion::conectar()->prepare($sql);

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }

    public function registrar() {

        $sql = "INSERT INTO areasocial (nombre, descripcion) VALUES(?, ?)";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->nombre);
        $stmt->bindParam(2, $this->descripcion);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

}