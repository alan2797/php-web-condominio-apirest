<?php
header('Accept: application/json');
header('Content-type: json/aplication');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: accept, content-type');

echo json_encode(array(
            "response" => 1,
            "message" => "Se registro el token"
        ));