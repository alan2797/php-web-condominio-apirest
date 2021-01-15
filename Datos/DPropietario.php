<?php

require_once 'Conexion.php';

class DPropietario {
    
    private $ci;
    private $nombre;
    private $apellido;
    private $fecha_nac;
    private $sexo;
    private $tipo;
    private $token;
    private $fkidusuario;
    
    function __construct($ci = null,$nombre = null, $apellido = null, $fecha_nac = null, 
                        $sexo = null, $tipo = null, $fkidusuario = null) {
        $this->ci = $ci;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fecha_nac = $fecha_nac;
        $this->sexo = $sexo;
        $this->tipo = $tipo;
        $this->token = null;
        $this->fkidusuario = $fkidusuario;
    }
    
    function gerCi() {
        return $this->ci;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getFecha_nac() {
        return $this->fecha_nac;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getFkidusuario() {
        return $this->fkidusuario;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setFecha_nac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    function setFkidusuario($fkidusuario) {
        $this->fkidusuario = $fkidusuario;
    }

    function getToken() {
        return $this->token;
    }
    
    function setToken($token) {
        $this->token = $token;
    }
    
    function getPropietarioById($id) {
        
        $sql = "select * from propietario where id = ?";
        
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $id);
        
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
        
    }

    function getPropietarios() {
        $sql = "select * from propietario";
        
        $stmt = Conexion::conectar()->prepare($sql);        
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;   
    }

    function registrar() {

        $sql = "INSERT INTO propietario(ci,nombre,apellido,fecha_nac,sexo,tipo,fkidusuario)
                VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->ci);
        $stmt->bindParam(2, $this->nombre);
        $stmt->bindParam(3, $this->apellido);
        $stmt->bindParam(4, $this->fecha_nac);
        $stmt->bindParam(5, $this->sexo);
        $stmt->bindParam(6, $this->tipo);
        $stmt->bindParam(7, $this->fkidusuario);

        return $stmt->execute();
    }

    function getPropietario($id) {

        $sql = "SELECT * FROM propietario WHERE idpropietario = ?;";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $id);

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    function editar($id) {

        $sql = "UPDATE propietario SET ci = ?, nombre = ?, apellido = ?, fecha_nac = ?, sexo = ?, 
                                        tipo = ?, fkidusuario = ? WHERE idpropietario = ?";
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
