<?php

require_once '../Negocio/NComunicado.php';

$com = new NComunicado();
$comunicados = $com->getAllN();

echo json_encode(array(
    "response" => 1,
    "data" => $comunicados
));

