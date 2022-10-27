<?php

include_once "../Models/Models.php";

$model = new Models();

$cargaUtil = json_decode(file_get_contents("php://input"));
$nombres = $cargaUtil->nombres;
$apellidos = $cargaUtil->apellidos;
$edad = $cargaUtil->edad;
$genero = $cargaUtil->genero;

$res = $model->createData($nombres, $apellidos, $edad, $genero);

echo json_encode($res);