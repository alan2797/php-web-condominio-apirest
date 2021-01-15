<?php

require_once 'Conexion.php';
class DUsuario {

    private $login;
    private $contrasenia;
    private $token;

    public function __construct($login = null, $contrasenia = null) {
        $this->login = $login;
        $this->contrasenia = $contrasenia;
        $this->token = null;
    }

    function getLogin() {
        return $this->login;
    }

    function getContrasenia() {
        return $this->contrasenia;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setContrasenia($contrasenia) {
        $this->contrasenia = $contrasenia;
    }

    function getToken() {
        return $this->token;
    }

    function setToken($token) {
        $this->token = $token;
    }

    function registrar() {

        $sql = "INSERT INTO usuario(login,contrasenia)
                VALUES(?, ?)";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->login);
        $stmt->bindParam(2, $this->contrasenia);

        return $stmt->execute();

        $sql = "select * from usuario order by desc idusuario limit 1";
        $stmt = Conexion::conectar()->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return -1;
    }

    public function login() {

        $sql = "select * from usuario where login = ? and contrasenia = ?";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->login);
        $stmt->bindParam(2, $this->contrasenia);

        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (count($result) > 0) {
                return $result;
            }
        }
        return false;
    }

    function getTokenById($id) {

    }
    
    function getUsuarios() {
        $sql = "select * from usuario";
        
        $stmt = Conexion::conectar()->prepare($sql);        
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;   
    }
    
    function registrarToken($id) {

        $sql = "UPDATE usuario SET token = ? WHERE idusuario = ?";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->token);
        $stmt->bindParam(2, $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}