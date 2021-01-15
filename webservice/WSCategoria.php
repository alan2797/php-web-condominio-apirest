<?php
header("Access-Control-Allow-Origin: *");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require_once '../negocio/NCategoria.php';
 //$accion = filter_input(INPUT_POST, "accion");
    $datos = json_decode(file_get_contents("php://input"),true);
    $accion = $datos["accion"];
 if($accion == 'getDatos'){
     $categoria = getCategoriaN();
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $categoria
      ));  
     
 }else if($accion == 'insertarDatos') {
    $descripcion = $datos['descripcion'];
    $categoria = insertarCategoriaN($descripcion);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $categoria
      ));  
  }else if($accion == 'eliminarDatos') {
    $idcategoria = $datos['idcategoria'];
    $categoria = eliminarCategoriaN($idcategoria);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $categoria
      ));  
  }else{
    echo json_encode(array(
        "response" => -2,
        'datos' => "no hay ninguna accion",
        "accion" => $accion
    ));
 }
 
 



