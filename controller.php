<?php

//Incluye la clase Util que tiene el controlador para la API
include_once 'resources/Util.php';

//Permite los origenes desconocidos y los metodos GET, POST, PUT, DELETE
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

//Analisis de URI
$uri = explode("/", $_SERVER['REQUEST_URI']);
//Analisis del body que se pasa por debajo
$body = file_get_contents("php://input");

//Creacion del objeto
$util = new Util($uri, $body);

//Procesamiento de datos y funcionamiento de la api
$util->analizeRequest();


