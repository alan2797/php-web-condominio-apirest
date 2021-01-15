<?php

require_once 'Conexion.php';

class DComunicado {
    
    private $titulo;
    private $descripcion;
    private $fecha;
    private $hora;
    private $tipo;
    private $importancia;
    
    function __construct($titulo = null, $descripcion = null, $fecha = null, $hora = null, $tipo = null, $importancia = null) {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->tipo = $tipo;
        $this->importancia = $importancia;
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

    function getHora() {
        return $this->hora;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getImportancia() {
        return $this->importancia;
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

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setImportancia($importancia) {
        $this->importancia = $importancia;
    }

    public function getAll() {
        
        $sql = "select * from comunicado";
        $stmt = Conexion::conectar()->prepare($sql);
        
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function registrar() {

        $sql = "INSERT INTO comunicado(titulo, descripcion, fecha, hora, tipo, importancia)
                VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->titulo);
        $stmt->bindParam(2, $this->descripcion);
        $stmt->bindParam(3, $this->fecha);
        $stmt->bindParam(4, $this->hora);
        $stmt->bindParam(5, $this->tipo);
        $stmt->bindParam(6, $this->importancia);
        
        return $stmt->execute();
    }
}

