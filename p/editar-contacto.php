<?php
require __DIR__ . '/../bd/contactosAdapter.php';


$idContacto = $_GET['idContacto'];
$contacto;
$guardado = FALSE;
// $errores = [];
if (isset($idContacto)) {
  $contacto = ContactoAdapter::getContactById($idContacto);
  if ($contacto != null) {
    if (
      isset($_POST['nombres']) &&
      isset($_POST['apellidos']) &&
      isset($_POST['edad']) &&
      isset($_POST['correo']) &&
      isset($_POST['telefono'])

    ) {
      $contacto->nombres = $_POST['nombres'];
      $contacto->apellidos = $_POST['apellidos'];
      $contacto->edad = $_POST['edad'];
      $contacto->correo = $_POST['correo'];
      $contacto->telefono = $_POST['telefono'];

      $res = ContactoAdapter::updateContact($contacto);
      if ($res === FALSE) {
        echo "no se pudo actualizar el contacto";
      } else {
        $guardado = TRUE;
        header('location: /');
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
      <label for="nombre">Nombre</label>
      <input class="inputs-register updateTextCenter" type="text" name="nombres" value="<?php echo $contacto->nombres; ?>">
    </td>
    <br>
    <td>
      <label for="apellidos">Apellidos</label>
      <input class="inputs-register updateTextCenter" type="text" name="apellidos" value="<?php echo $contacto->apellidos; ?>">
    </td>
    <br>
    <td>
      <label for="edad">Edad</label>
      <input class="inputs-register updateTextCenter" type="text" name="edad" value="<?php echo $contacto->edad; ?>">
    </td>
    <br>
    <td>
      <label for="correo">Correo</label>
      <input class="inputs-register updateTextCenter" type="email" name="correo" value="<?php echo $contacto->correo; ?>">
    </td>
    <br>
    <td>
      <label for="telefono">Telefono</label>
      <input class="inputs-register updateTextCenter" type="text" name="telefono" value="<?php echo $contacto->telefono; ?>">
    </td>
    <br>
    <td>
      <input class="submit-register" type="submit" name="Guardar" value="EDITAR">
    </td>
  </form>
</body>

</html>