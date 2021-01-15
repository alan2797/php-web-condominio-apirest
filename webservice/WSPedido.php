<?php
header("Access-Control-Allow-Origin: *");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require_once '../negocio/NPedido.php';
 require_once '../negocio/NDetallePedido.php';
 //$accion = filter_input(INPUT_POST, "accion");
    $datos = json_decode(file_get_contents("php://input"),true);
    $accion = $datos["accion"];
 if($accion == 'getDatos'){
     $pedido = getPedidoN();
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $pedido
      ));  
     
 }else if($accion == 'insertarDatos') {
    $fecha = $datos['fecha'];
    $montototal = $datos['montototal'];
    $arrayDetallePedido = $datos['arrayDetallePedido'];
    $pedido = insertarPedidoN($fecha,$montototal);
    $idultimopedido= getUltimoIdPedidoN();
    if(sizeof($arrayDetallePedido)>0){
        foreach ($arrayDetallePedido as $key => $value) {
            insertarDetallePedidoN($idultimopedido['idpedido'],$value['fkidplato'], $value['cantidad'], $value['subtotal']);
        }
    }
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $arrayDetallePedido
      ));  
  }else if($accion == 'verDatos') {
    $idpedido = $datos['idpedido'];
    $pedido = verPedidoN($idpedido);
    $detalle = getDetallePedidoN($idpedido);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $pedido,
         "detalle" => $detalle
      ));  
  }else if($accion == 'anularDatos') {
     $idpedido= $datos['idpedido'];
    $pedido = anularPedidoN($idpedido);
      echo json_encode(array(
        "response" => 1,
        'accion' => $accion,
         "data" => $pedido
      ));  
  }else{
    echo json_encode(array(
        "response" => -2,
        'datos' => "no hay ninguna accion",
        "accion" => $accion
    ));
 }
 
 



