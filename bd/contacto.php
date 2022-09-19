<?php

class Contacto
{
  public $idContacto;
  public $nombres;
  public $apellidos;
  public $edad;
  public $correo;
  public $telefono;

  function __construct($idContacto, $nombres, $apellidos, $edad, $correo, $telefono)
  {
    $this->idContacto = $idContacto;
    $this->nombres = $nombres;
    $this->apellidos = $apellidos;
    $this->edad = $edad;
    $this->correo = $correo;
    $this->telefono = $telefono;
  }

  static function desdeFila($fila)
  {
    $contactos = new Contacto(
      $fila['idContacto'],
      $fila['nombres'],
      $fila['apellidos'],
      $fila['edad'],
      $fila['correo'],
      $fila['telefono']
    );
    return $contactos;
  }
}
