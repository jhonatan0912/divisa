<?php
class ConeccionAgendaElectronica
{
  private $con;
  function __construct()
  {
    $this->con = mysqli_connect(
      '127.0.0.1', //localhost
      'root', //user
      '1234', //passwordDB
      'caso_practico', //name_DB
      3306 //port
    );
  }

  function numberContact($sql)
  {
    $respuesta = mysqli_query($this->con, $sql);
    $cantidadContactos = mysqli_num_rows($respuesta);
    return $cantidadContactos;
  }

  function create($sql)
  {
    $respuesta = mysqli_query($this->con, $sql);
    if ($respuesta === TRUE) {
      return mysqli_insert_id($this->con);
    } else {
      return FALSE;
    }
  }

  function update($sql)
  {
    $respuesta = mysqli_query($this->con, $sql);
    return $respuesta;
  }

  function delete($sql)
  {
    $respuesta = mysqli_query($this->con, $sql);
    return $respuesta;
  }

  function consulta($sql)
  {
    $respuesta = mysqli_query($this->con, $sql);
    $tabla = [];
    while ($fila = mysqli_fetch_assoc($respuesta)) {
      $tabla[] = $fila;
    }
    return $tabla;
  }

  function close()
  {
    mysqli_close($this->con);
  }
}
