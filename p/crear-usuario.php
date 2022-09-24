<?php
require_once __DIR__ . '/../bd/userController.php'; 
date_default_timezone_set('America/Lima');
$date = date("Y");
$numberRows = UserController::countNumberContacts(); 
if (isset($_POST['registrar'])) {
  $userCode = $date . str_pad($numberRows + 1,  4, "0", STR_PAD_LEFT);
  $name = $_POST['name'];
  $lastName = $_POST['lastName'];
  $documentType = $_POST['documentType'];
  $document = $_POST['document'];
  $bornDate = $_POST['bornDate'];
  $address = $_POST['address'];
  $country = $_POST['country'];
  $user = new User(0, $userCode, $name, $lastName, $documentType, $document, $bornDate, $address, $country);
  $id = UserController::createContact($user); 

  if ($id != false) {
    // echo "registrado correctamente";
  } else {
    // echo "error";
  }
}

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/../estilo.css">
  <!-- <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script> -->
  <title>Registro cliente</title>
</head>

<body>

  <form class="form-register" action="" method="POST">
    <h1>REGISTRO USUARIOS</h1>
    <br>
    <br>
    <label for="">
      NOMBRES: <small>(obligatorio)</small>
    </label>
    <input class="inputs-register" type="text" name="name" pattern="[A-Za-z]{1,50}" title="Solo debe considerar letras mayusculas o minusculas / Sin números" required>
    <br>
    <label for="">
      APELLIDOS: <small>(obligatorio)</small>
    </label>
    <input class="inputs-register" type="text" name="lastName" pattern="[A-Za-z]{1,80}" title="solo debe considerar letras mayusculas o minusculas / Sin números" required>
    <br>
    <label for="">
      TIPO DOCUMENTO: <small>(obligatorio)</small>
    </label>
    <select name="documentType" id="" required class="inputs-register">
      <option value="DNI" name="DNI">
        DNI
      </option>
      <option value="PASAPORTE" name="PASAPORTE">
        PASAPORTE
      </option>
    </select>
    <br>
    <label for="correo">
      DOCUMENTO: <small>(obligatorio)</small>
    </label>
    <input class="inputs-register" type="number" name="document" min="1" minlength="8" maxlength="12" pattern="[0-9]" required>
    <br>
    <label for="">
      FECHA NACIMIENTO:
    </label>
    <input class="inputs-register" type="date" name="bornDate" max="2004-01-01" required>
    <br>
    <label for="">
      DIRECCION:
    </label>
    <input class="inputs-register" type="text" name="address">
    <br>
    <label for="">PAÍS:</label>
    <select name=" country" class="inputs-register">
      <option value="peru">Peru</option>
      <option value="colombia">Colombia</option>
      <option value="brasil">Brasil</option>
      <option value="chile">Chile</option>
      <option value="argentina">Argentina</option>
      <option value="otros">Otros</option>
    </select>
    <br>
    <input class="btn" type="submit" name="registrar" value="REGISTRAR">
    <input class="btn" type="reset" name="borrar" value="BORRAR">
  </form>

</body>

</html>