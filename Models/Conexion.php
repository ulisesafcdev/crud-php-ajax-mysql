<?php

class Conexion 
{
  static function getConnection()
  {
    $conn = new mysqli("localhost", "root", "a1234567890z", "coursephp");

    if($conn->connect_errno){
      die("Fallo al conectar a la base de datos... " . $conn->connect_error);
    } else {
      return $conn;
    }
  }
}