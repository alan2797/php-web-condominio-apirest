<?php

require_once 'Conexion.php';

class DMascota {

    private $nombre;
    private $edad;
    private $raza;
    private $tipo;
    private $fkidpropietario;

    public function __construct($nombre = null, $edad = null, $raza = null, $tipo = null, $fkidpropietario = null) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->raza = $raza;
        $this->tipo = $tipo;
        $this->fkidpropietario = $fkidpropietario;
    }

    public function getMascotas() {

        $sql = "select * from mascota";

        $stmt = Conexion::conectar()->prepare($sql);
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function registrar() {
        
        $sql = "INSERT INTO mascota (nombre, edad, raza, tipoanimal, fkidpropietario) VALUES (?, ?, ?, ?, ?);";

        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->nombre);
        $stmt->bindParam(2, $this->edad);
        $stmt->bindParam(3, $this->raza);
        $stmt->bindParam(4, $this->tipo);
        $stmt->bindParam(5, $this->fkidpropietario);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}