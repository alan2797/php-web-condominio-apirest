<?php
header("Access-Control-Allow-Origin: *");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require_once '../negocio/NMedida.php';
 //$accion = filter_input(INPUT_POST, "accion");
    $datos = json_decode(file_get_contents("php://input"),true);
    $accion = $datos["accion"];
 if($accion == 'getDatos'){
     $medida = getMedidaN();
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $medida
      ));  
     
 }else if($accion == 'insertarDatos') {
    $descripcion = $datos['descripcion'];
    $abreviacion = $datos['abreviacion'];
    $medida = insertarMedidaN($descripcion, $abreviacion);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $medida
      ));  
  }else if($accion == 'editarDatos') {
    $idmedida = $datos['idmedida'];
    $medida = editarMedidaN($idmedida);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $medida
      ));  
  }else if($accion == 'actualizarDatos') {
    $idmedida = $datos['idmedida'];
    $descripcion = $datos['descripcion'];
    $abreviacion = $datos['abreviacion'];
    $medida = actualizarMedidaN($idmedida,$descripcion, $abreviacion);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $medida
      ));  
  }else if($accion == 'eliminarDatos') {
    $idmedida = $datos['idmedida'];
    $medida = eliminarMedidaN($idmedida);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $medida
      ));  
  }else{
    echo json_encode(array(
        "response" => -2,
        'datos' => "no hay ninguna accion",
        "accion" => $accion
    ));
 }
 
 



