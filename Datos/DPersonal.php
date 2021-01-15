<?php

require_once 'Conexion.php';

class DPersonal {

    private $ci;
    private $nombre;
    private $apellido;
    private $fecha_nac;
    private $sexo;
    private $tipo;
    private $fkidusuario;

    public function __construct($ci = null, $nombre = null, $apellido = null, $fecha_nac = null, $sexo = null,
                                $tipo = null, $fkidusuario = null) {
        $this->ci = $ci;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fecha_nac = $fecha_nac;
        $this->sexo = $sexo;
        $this->tipo = $tipo;
        $this->fkidusuario = $fkidusuario;
    }

    public function getAdministrativos() {

        $sql = "SELECT * FROM administrador";
        $stmt = Conexion::conectar()->prepare($sql);
        if ($stmt->execute() && $stmt->rowCount()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    function registrar() {

        $sql = "INSERT INTO administrador(ci,nombre,apellido,fecha_nac,sexo,tipo,fkidusuario)
                VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->ci);
        $stmt->bindParam(2, $this->nombre);
        $stmt->bindParam(3, $this->apellido);
        $stmt->bindParam(4, $this->fecha_nac);
        $stmt->bindParam(5, $this->sexo);
        $stmt->bindParam(6, $this->tipo);
        $stmt->bindParam(7, $this->fkidusuario);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function getPersonal($id){

        $sql = "SELECT * FROM administrador WHERE idadministrador = ?";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $id);

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    function editar($id) {

        $sql = "UPDATE administrador SET ci = ?, nombre = ?, apellido = ?, fecha_nac = ?, sexo = ?, 
                                        tipo = ?, fkidusuario = ? WHERE idadministrador = ?";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->ci);
        $stmt->bindParam(2, $this->nombre);
        $stmt->bindParam(3, $this->apellido);
        $stmt->bindParam(4, $this->fecha_nac);
        $stmt->bindParam(5, $this->sexo);
        $stmt->bindParam(6, $this->tipo);
        $stmt->bindParam(7, $this->fkidusuario);
        $stmt->bindParam(8, $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

}