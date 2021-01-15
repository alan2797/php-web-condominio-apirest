<?php

require_once 'Conexion.php';

class DVivienda {

    private $nro_vivienda;
    private $calle;
    private $fkidpropietario;

    public function __construct($nro_vivienda = null, $calle = null, $fkidpropietario = null) {
        $this->nro_vivienda = $nro_vivienda;
        $this->calle = $calle;
        $this->fkidpropietario = $fkidpropietario;
    }

    public function getViviendas() {
        
        $sql = "select * from vivienda";
        $stmt = Conexion::conectar()->prepare($sql);
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function registrar() {
        $sql = "INSERT INTO vivienda (nro_vivienda, calle, fkidpropietario) VALUES (?, ?, ?);";

        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->nro_vivienda);
        $stmt->bindParam(2, $this->calle);
        $stmt->bindParam(3, $this->fkidpropietario);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getVivienda($id) {

        $sql = "SELECT * FROM vivienda WHERE idvivienda = ?;";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $id);
        
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;

    }
}