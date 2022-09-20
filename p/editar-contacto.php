<?php
require __DIR__ . '/../bd/contactosAdapter.php';

$idUser = $_GET['idUser'];
$user;
$guardado = FALSE;
// $errores = [];
if (isset($idUser)) {
  $user = ContactoAdapter::getContactById($idUser);
  if ($user != null) {
    if (
      isset($_POST['name']) &&
      isset($_POST['lastName']) &&
      isset($_POST['documentType']) &&
      isset($_POST['document']) &&
      isset($_POST['bornDate']) &&
      isset($_POST['address']) &&
      isset($_POST['country'])

    ) {
      $user->name = $_POST['name'];
      $user->lastName = $_POST['lastName'];
      $user->documentType = $_POST['documentType'];
      $user->document = $_POST['document'];
      $user->bornDate = $_POST['bornDate'];
      $user->address = $_POST['address'];
      $user->country = $_POST['country'];

      $res = ContactoAdapter::updateContact($user);
      if ($res === FALSE) {
        echo "no se pudo actualizar el user";
      } else {
        $guardado = TRUE;
        header('location: /p/listar-contacto.php');
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/../estilo.css">
  <title>Editar Contacto</title>
</head>

<body>

  <form class="form-register" action="" method="POST">
    <h1>ACTUALIZAR DATOS:</h1>
    <br>
    <td>
      <label for="">Nombre</label>
      <input class="inputs-register updateTextCenter" type="text" name="name" value="<?php echo $user->name; ?>">
    </td>
    <br>
    <td>
      <label for="">Apellidos</label>
      <input class="inputs-register updateTextCenter" type="text" name="lastName" value="<?php echo $user->lastName; ?>">
    </td>
    <br>
    <td>
      <label for="">Tipo Documento:</label>
      <select name="documentType" class="inputs-register">
        <option value="DNI">DNI</option>
        <option value="PASAPORTE">PASAPORTE</option>
      </select>
    </td>
    <td>
      <label for="">Documento:</label>
      <input class="inputs-register updateTextCenter" type="text" name="document" value="<?php echo $user->document; ?>">
    </td>
    <br>
    <td>
      <label for="">Fecha Nacimiento</label>
      <input class="inputs-register updateTextCenter" type="date" name="bornDate" value="<?php echo $user->bornDate; ?>">
    </td>
    <br>
    <td>
      <label for="">Dirección:</label>
      <input class="inputs-register updateTextCenter" type="text" name="address" value="<?php echo $user->address; ?>">
    </td>
    <br>
    <td>
      <label for="">País:</label>
      <select name="country" class="inputs-register">
        <option value="peru">Peru</option>
        <option value="colombia">Colombia</option>
        <option value="brasil">Brasil</option>
        <option value="chile">Chile</option>
        <option value="argentina">Argentina</option>
        <option value="otros">Otros</option>
      </select>
    </td>
    <br>
    <td>
      <input class="submit-register" type="submit" name="Guardar" value="EDITAR">
    </td>
  </form>
</body>

</html>