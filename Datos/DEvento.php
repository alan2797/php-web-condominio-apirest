<?php

require_once 'Conexion.php';

class DEvento {
    
    private $titulo;
    private $descripcion;
    private $fecha;
    private $hora_ini;
    private $hora_fin;
    private $fkidpropietario;
    
    public function __construct($titulo = null, $descripcion = null, $fecha = null, $hora_ini = null,
                                $hora_fin = null, $fkidpropietario = null) {
                                    
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->hora_ini = $hora_ini;
        $this->hora_fin = $hora_fin;
        $this->fkidpropietario = $fkidpropietario;
        
    }
    
    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora_ini() {
        return $this->hora_ini;
    }

    function getHora_fin() {
        return $this->hora_fin;
    }

    function getFkidpropietario() {
        return $this->fkidpropietario;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora_ini($hora_ini) {
        $this->hora_ini = $hora_ini;
    }

    function setHora_fin($hora_fin) {
        $this->hora_fin = $hora_fin;
    }

    function setFkidpropietario($fkidpropietario) {
        $this->fkidpropietario = $fkidpropietario;
    }

    public function getEventos() {

        $sql = "select * from evento";
        $stmt = Conexion::conectar()->prepare($sql);
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;

    }

    public function registrarEvento($titulo, $descripcion, $fecha, $hora_inicio, $hora_fin, $idpropietario) {

        $sql = "INSERT INTO evento(titulo, descripcion, fecha, hora_ini, hora_fin, fkidpropietario)
                VALUES(?, ?, ?, ?, ?, ?);";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $titulo);
        $stmt->bindParam(2, $descripcion);
        $stmt->bindParam(3, $fecha);
        $stmt->bindParam(4, $hora_inicioi);
        $stmt->bindParam(5, $hora_fin);
        $stmt->bindParam(6, $idpropietario);
        
        return $stmt->execute();
    }
    public function obtenerIdPropietario($idusuario){
        $sql = "select * from propietario where fkidusuario = :idusuario;";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":idusuario",$idusuario);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

}

