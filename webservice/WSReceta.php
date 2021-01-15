<?php
header("Access-Control-Allow-Origin: *");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require_once '../negocio/NReceta.php';
 //$accion = filter_input(INPUT_POST, "accion");
    $datos = json_decode(file_get_contents("php://input"),true);
    $accion = $datos["accion"];
 if($accion == 'getDatos'){
     $receta = getRecetaN();
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $receta
      ));  
     
 }else if($accion == 'insertarDatos') {
    $descripcion = $datos['descripcion'];
    $cantidad = $datos['cantidad'];
    $fkidmedida = $datos['fkidmedida'];
    $fkidingrediente = $datos['fkidingrediente'];
    $receta = insertarRecetaN($descripcion, $cantidad,$fkidmedida,$fkidingrediente);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $receta
      ));  
  }else if($accion == 'editarDatos') {
    $idreceta = $datos['idreceta'];
    $receta = editarRecetaN($idreceta);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $receta
      ));  
  }else if($accion == 'actualizarDatos') {
    $idreceta = $datos['idreceta'];
    $descripcion = $datos['descripcion'];
    $cantidad = $datos['cantidad'];
    $fkidmedida = $datos['fkidmedida'];
    $fkidingrediente = $datos['fkidingrediente'];
    $receta = actualizarRecetaN($idreceta,$descripcion, $cantidad,$fkidmedida,$fkidingrediente);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $receta
      ));  
  }else if($accion == 'eliminarDatos') {
     $idreceta = $datos['idreceta'];
    $receta = eliminarRecetaN($idreceta);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $receta
      ));  
  }else{
    echo json_encode(array(
        "response" => -2,
        'datos' => "no hay ninguna accion",
        "accion" => $accion
    ));
 }
 
 



