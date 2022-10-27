<?php

include_once "../Models/Models.php";

$model = new Models();

// recuperamos todos los datos del arreglo que hemos retornado
$data = $model->getAllData();

// y lo mandamos en formato JSON
// ver archivo -> getAllData.js
echo json_encode($data);