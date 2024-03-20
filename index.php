<?php

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');

/* fogadja az url kéréseket és megválaszolja azokat
  GET http://localhost/TagdijBackend/index.php?ugyfel -> minden ugyfel
  GET http://localhost/TagdijBackend/index.php?ugyfel/(id) -> adott id ugyfel
  POST http://localhost/TagdijBackend/index.php?ugyfel -> létrehoz ugyfelet
  PUT http://localhost/TagdijBackend/index.php?ugyfel/{id} -> modosit adott ugyfelet
  DELETE http://localhost/TagdijBackend/index.php?ugyfel/{id} -> torol adott ugyfelet
  // */
//var_dump($_SERVER['REQUEST_METHOD']);
//var_dump($_SERVER['QUERY_STRING']);
$keresSzoveg = explode('/', $_SERVER['QUERY_STRING']);
if ($keresSzoveg[0] === 'ugyfel') {
    require_once 'ugyfel/index.php';
} else {
    http_response_code(404);
    $errorJson = array("message" => 'Nincs ilyen api');
    return json_encode($errorJson);
}