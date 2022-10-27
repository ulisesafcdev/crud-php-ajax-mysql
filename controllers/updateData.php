<?php

include_once '../Models/Models.php';

$model = new Models();

$cargaUtil = json_decode(file_get_contents("php://input"));
$id = $cargaUtil->id;
$nombres = $cargaUtil->nombres;
$apellidos = $cargaUtil->apellidos;
$edad = $cargaUtil->edad;
$genero = $cargaUtil->genero;

$res = $model->updateData($nombres, $apellidos, $edad, $genero, $id);

echo json_encode($res);