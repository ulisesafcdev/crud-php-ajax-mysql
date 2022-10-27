<?php

include_once "Conexion.php";

class Models extends Conexion
{
  public function getAllData()
  {
    $conn = Conexion::getConnection();

    $query = "SELECT * FROM datos_personales";
    $result = $conn->query($query);

    $filas = [];
    if($result){
      while($fila = $result->fetch_assoc()){
        $filas[] = $fila;
      }
    } else {
      echo "Fallo al obtener datos... " . $conn->connect_error;
    }
    
    // retornamos todas las filas en un arreglo
    // ver archivo -> getAllData.php
    return $filas;
    
  }

  public function deleteData($id)
  {
    $conn = Conexion::getConnection();

    $query = "DELETE FROM datos_personales WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    
    return $stmt->execute();
  }

  public function createData($nombres, $apellidos, $edad, $genero)
  {
    $conn = Conexion::getConnection();

    $query = "INSERT INTO datos_personales(nombres, apellidos, edad, genero) VALUES(?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssii', $nombres, $apellidos, $edad, $genero);

    return $stmt->execute();
  }

  public function updateData($nombres, $apellidos, $edad, $genero, $id)
  {
    $conn = Conexion::getConnection();

    $query = "UPDATE datos_personales SET nombres = ?, apellidos = ?, edad = ?, genero = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssiii', $nombres, $apellidos, $edad, $genero, $id);

    return $stmt->execute();
  }
}