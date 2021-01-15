<?php
header("Access-Control-Allow-Origin: *");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require_once '../negocio/NIngrediente.php';
 //$accion = filter_input(INPUT_POST, "accion");
    $datos = json_decode(file_get_contents("php://input"),true);
    $accion = $datos["accion"];
 if($accion == 'getDatos'){
     $ingrediente = getIngredienteN();
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $ingrediente
      ));  
     
 }else if($accion == 'insertarDatos') {
    $nombre = $datos['nombre'];
    $costo = $datos['costo'];
    $stock = $datos['stock'];
    $ingrediente = insertarIngredienteN($nombre, $costo,$stock);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $ingrediente
      ));  
  }else if($accion == 'editarDatos') {
    $idingrediente = $datos['idingrediente'];
    $ingrediente = editarIngredienteN($idingrediente);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $ingrediente
      ));  
  }else if($accion == 'actualizarDatos') {
    $idingrediente = $datos['idingrediente'];
    $nombre = $datos['nombre'];
    $costo = $datos['costo'];
    $stock = $datos['stock'];
    $ingrediente = actualizarIngredienteN($idingrediente,$nombre, $costo,$stock);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $ingrediente
      ));  
  }else if($accion == 'eliminarDatos') {
     $idingrediente = $datos['idingrediente'];
    $ingrediente = eliminarIngredienteN($idingrediente);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $ingrediente
      ));  
  }else{
    echo json_encode(array(
        "response" => -2,
        'datos' => "no hay ninguna accion",
        "accion" => $accion
    ));
 }
 
 



