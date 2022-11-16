<?php
session_start();
require 'funcs/conexion.php';
require 'funcs/funcs.php';
require 'funcs/constantes.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$URL = $data['url'];
$HTTP_METHOD = $data['method'];
$BODY = key_exists('data', $data)? $data['data']: null;
$make_call = callAPI($HTTP_METHOD, $URL_SERVICIO . $URL, $BODY);
$response = json_decode($make_call, true);
echo json_encode($response, JSON_PRETTY_PRINT);

