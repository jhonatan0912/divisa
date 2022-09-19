<?php
require_once __DIR__ . '/coneccion.php';
require_once __DIR__ . '/contacto.php';
class ContactoAdapter
{


  static function listar()
  {
    $db = new ConeccionAgendaElectronica();
    $sql = "SELECT * FROM agenda_electronica.contactos;";
    $tabla = $db->consulta($sql);
      $contacto = [];
      foreach ($tabla as $fila) {
        $contacto[] = Contacto::desdeFila($fila);
      }
      return $contacto;
  }


  static function listarPorNombre($nombresSearch)
  {
    $db = new ConeccionAgendaElectronica();
    $sql = "SELECT idContacto,
                  nombres,
                  apellidos,
                  edad,
                  correo,
                  telefono
     FROM `agenda_electronica`.`contactos`
     WHERE nombres 
     LIKE '$nombresSearch';";
    $tabla = $db->consulta($sql);
    if (count($tabla) > 0) {
      return Contacto::desdeFila($tabla[0]);
    } else {
      return null;
    }
  }

  static function countNumberContacts()
  {
    $db = new ConeccionAgendaElectronica();
    $sql = "SELECT * FROM agenda_electronica.contactos;";
    $numeroContactos = $db->numberContact($sql);
    return $numeroContactos;
  }

  static function getContactById($idContacto)
  {
    $db = new ConeccionAgendaElectronica();
    $sql = "SELECT * FROM `agenda_electronica`.`contactos`
     WHERE idContacto = $idContacto;";
    $tabla = $db->consulta($sql);
    if (count($tabla) > 0) {
      return Contacto::desdeFila($tabla[0]);
    } else {
      return null;
    }
  }


  static function createContact($contacto)
  {
    $db = new ConeccionAgendaElectronica();
    $sql = "INSERT INTO
     `agenda_electronica`.`contactos`
     ( `nombres`,
      `apellidos`,
      `edad`,
      `correo`,
      `telefono`)
      VALUES 
      ('$contacto->nombres',
      '$contacto->apellidos',
      '$contacto->edad',
      '$contacto->correo',
      '$contacto->telefono');";
    echo $sql;
    $id = $db->create($sql);
    echo $id;
    $db->close();
    return $id;
  }

  static function updateContact($contacto)
  {
    $db = new ConeccionAgendaElectronica();
    $sql = "UPDATE `agenda_electronica`.`contactos`
    SET
    `nombres` = '$contacto->nombres',
    `apellidos` = '$contacto->apellidos',
    `edad` = '$contacto->edad',
    `correo` = '$contacto->correo',
    `telefono` = '$contacto->telefono'
    WHERE  idContacto = $contacto->idContacto";
    // echo $sql;
    $respuesta = $db->update($sql);
    $db->close();
    return $respuesta;
  }

  static function deleteContact($id)
  {
    $sql = "DELETE FROM `agenda_electronica`.`contactos`
          WHERE idContacto=$id;";
    $db = new ConeccionAgendaElectronica();
    $respuesta = $db->delete($sql);
    $db->close();
    return $respuesta;
  }
}
