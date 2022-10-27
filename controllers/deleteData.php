<?php

include_once "../Models/Models.php";

$model = new Models();
$id = $_GET['id'];
$res = $model->deleteData($id);

echo json_encode($res);