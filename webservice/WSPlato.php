<?php
header("Access-Control-Allow-Origin: *");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require_once '../negocio/NPlato.php';
 require_once '../negocio/NDeatellePlato.php';
 //$accion = filter_input(INPUT_POST, "accion");
    $datos = json_decode(file_get_contents("php://input"),true);
    $accion = $datos["accion"];
 if($accion == 'getDatos'){
     $plato = getPlatoN();
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $plato
      ));  
     
 }else if($accion == 'insertarDatos') {
    $nombre = $datos['nombre'];
    $precio = $datos['precio'];
    $descripcion = $datos['descripcion'];
    $fkidcategoria = $datos['fkidcategoria'];
    $arrayreceta = $datos['arrayidreceta'];
    $arrayprioridad = $datos['arrayPriorida'];
    $arraypreferencia = $datos['arrayPreferencia'];
    $arrayDatosDetalle = $datos['arrayDatosDetalle'];
    $plato = insertarPlatoN($nombre,$precio,$descripcion,$fkidcategoria);
    $idultimoplato = getUltimoIdPlatoN();
    if(sizeof($arrayreceta)>0){
        foreach ($arrayDatosDetalle as $key => $value) {
            insertarDetallePlatoN($idultimoplato['idplato'],$value['fkidreceta'], $value['prioridad'], $value['preferencia']);
        }
    }
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $arrayDatosDetalle
      ));  
  }else if($accion == 'editarDatos') {
    $idplato = $datos['idplato'];
    $plato = editarPlatoN($idplato);
    $detalle = getDetallePlatoN($idplato);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $plato,
         "detalle" => $detalle
      ));  
  }else if($accion == 'actualizarDatos') {
    $idplato = $datos['idplato'];
    $nombre = $datos['nombre'];
    $precio = $datos['precio'];
    $descripcion = $datos['descripcion'];
    $fkidcategoria = $datos['fkidcategoria'];
    $plato = actualizarPlatoN($idplato,$nombre,$precio,$descripcion,$fkidcategoria);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $plato
      ));  
  }else if($accion == 'eliminarDatos') {
     $idplato = $datos['idplato'];
    $plato = eliminarPlatoN($idplato);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $plato
      ));  
  }else{
    echo json_encode(array(
        "response" => -2,
        'datos' => "no hay ninguna accion",
        "accion" => $accion
    ));
 }
 
 



