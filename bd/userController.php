<?php
require_once __DIR__ . '/coneccion.php';
require_once __DIR__ . '/user.php';
class UserController
{


  static function listar()
  {
    $db = new ConeccionAgendaElectronica();
    $sql = "SELECT * FROM caso_practico.user;";
    $tabla = $db->consulta($sql);
    $user = [];
    foreach ($tabla as $fila) {
      $user[] = User::desdeFila($fila);
    }
    return $user;
  }


  static function listarPorNombre($documento)
  {
    $db = new ConeccionAgendaElectronica();
    $sql = "SELECT idUser,
                  userCode,
                  name,
                  lastName,
                  documentType,
                  document,
                  bornDate,
                  address,
                  country
     FROM caso_practico.user
     WHERE document 
     LIKE '$documento';";
    // echo $sql;

    $tabla = $db->consulta($sql);
    if (count($tabla) > 0) {
      return User::desdeFila($tabla[0]);
    } else {
      return null;
    }
  }

  static function countNumberContacts()
  {
    $db = new ConeccionAgendaElectronica();
    $sql = "SELECT * FROM caso_practico.user;";
    $usersQuantity = $db->numberContact($sql);
    return $usersQuantity;
  }

  static function getContactById($idUser)
  {
    $db = new ConeccionAgendaElectronica();
    $sql = "SELECT * FROM `caso_practico`.`user`
     WHERE idUser = $idUser;";
    $tabla = $db->consulta($sql);
    if (count($tabla) > 0) {
      return User::desdeFila($tabla[0]);
    } else {
      return null;
    }
  }


  static function createContact($user)
  {
    $db = new ConeccionAgendaElectronica();
    $sql = "INSERT INTO `caso_practico`.`user`
            (`userCode`,
            `name`,
            `lastName`,
            `documentType`,
            `document`,
            `bornDate`,
            `address`,
            `country`)
            VALUES
            (
              '$user->userCode',
              '$user->name',
              '$user->lastName',
              '$user->documentType',
              '$user->document',
              '$user->bornDate',
              '$user->address',
              '$user->country'
            );";
    // echo $sql;
    $id = $db->create($sql);
    return $id;
  }

  static function updateContact($user)
  {
    $db = new ConeccionAgendaElectronica();
    // echo $sql;
    $sql = "UPDATE `caso_practico`.`user`
SET
`userCode` = '$user->userCode',
`name` = '$user->name',
`lastName` = '$user->lastName',
`documentType` = '$user->documentType',
`document` = '$user->document',
`bornDate` = '$user->bornDate',
`address` = '$user->address',
`country` = '$user->country'
WHERE `idUser` = '$user->idUser';";
    $respuesta = $db->update($sql);
    $db->close();
    return $respuesta;
  }
}
