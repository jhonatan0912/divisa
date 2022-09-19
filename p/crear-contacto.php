<?php
require_once __DIR__ . '/../bd/contactosAdapter.php';


$idContacto = '';


if (isset($_POST['registrar'])) {
  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $edad = $_POST['edad'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];

  $contacto = new Contacto(0, $nombres, $apellidos, $edad, $correo, $telefono);

  $id = ContactoAdapter::createContact($contacto);
  if ($id) {
    header('location: /');
  }
}

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/../estilo.css">
  <title>Crear Contacto</title>
</head>

<body>

  <form class="form-register" action="" method="POST">
    <h1>REGISTRO CONTACTO</h1>
    <br>
    <br>
    <label for="nombres">NOMBRES:</label>
    <input class="inputs-register" type="text" name="nombres">
    <br>
    <label for="apellidos">APELLIDOS:</label>
    <input class="inputs-register" type="text" name="apellidos">
    <br>
    <label for="edad">EDAD:</label>
    <input class="inputs-register" type="text" name="edad">
    <br>
    <label for="correo">CORREO:</label>
    <input class="inputs-register" type="text" name="correo">
    <br>
    <label for="telefono">TELEFONO:</label>
    <input class="inputs-register" type="text" name="telefono">
    <br>
    <input class="submit-register" type="submit" name="registrar" value="REGISTRAR">
  </form>

</body>

</html>