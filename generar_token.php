<?php
require 'vendor/autoload.php';//para cargar las librerías instaladas
use Firebase\JWT\JWT;//esta clase sirve para codificar y para decodificar tpkens
use Firebase\JWT\Key;//esta es para verificar los tokens

function codificar($payload) {
    $privatekey = file_get_contents('private.key');
    $payload['iat'] = time();
    $payload['exp'] = time() + 3600;

    $jwt = JWT::encode($payload, $privatekey, 'RS256');
    return $jwt;
}

function decodificar($token) {
    $publickey = file_get_contents('public.key');
    $JWTdecode = JWT::decode($token, new Key($publickey, 'RS256'));
    return $JWTdecode;
}

$token = codificar([
    'idcomida'   => 1,
    'comida' => 'Milanesas',
    'tipo' => 'Guisado',
    'descripcion' => 'Milanesa empanizada crujiente',
]);

print_r($token);

$JWTdecode = decodificar($token);

print_r($JWTdecode);
