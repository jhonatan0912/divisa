<?php

class User
{
  public $idUser;
  public $userCode;
  public $name;
  public $lastName;
  public $documentType;
  public $document;
  public $bornDate;
  public $address;
  public $country;

  function __construct(
    $idUser,
    $userCode,
    $name,
    $lastName,
    $documentType,
    $document,
    $bornDate,
    $address,
    $country,
  ) {
    $this->idUser = $idUser;
    $this->userCode = $userCode;
    $this->name = $name;
    $this->lastName = $lastName;
    $this->documentType = $documentType;
    $this->document = $document;
    $this->bornDate = $bornDate;
    $this->address = $address;
    $this->country = $country;
  }

  static function desdeFila($fila)
  {
    $users = new User(
      $fila['idUser'],
      $fila['userCode'],
      $fila['name'],
      $fila['lastName'],
      $fila['documentType'],
      $fila['document'],
      $fila['bornDate'],
      $fila['address'],
      $fila['country'],
    );
    return $users;
  }
}
