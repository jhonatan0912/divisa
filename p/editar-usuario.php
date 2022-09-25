<?php
require __DIR__ . '/../bd/userController.php';

$idUser = $_GET['idUser'];
$user;
$guardado = FALSE;
// $errores = [];
if (isset($idUser)) {
  $user = UserController::getContactById($idUser);
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

      $res = UserController::updateContact($user);
      if ($res === FALSE) {
        echo "no se pudo actualizar el user";
      } else {
        $guardado = TRUE;
        header('location: /p/listar-usuario.php');
      }
    }
  }
}
$countries = ["peru", "colombia", "brasil", "chile", "argentina", "otros"];
$documentTypes = ["DNI", "PASAPORTE"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/src/assets/css/estilo.css">
  <title>Editar usuario</title>
</head>

<body>
  <main class="update-user-container">

    <section class="update__section background1 section-update1">
      <div>
        <img src="/imagenes/logo.png" alt="logo" class="logo">
      </div>
      <button class="tittle">
        Cambista al paso S.A
      </button>
      <div>
        <img src="/imagenes/update-ilustration.png" alt="ilustration" class="update-ilustration">
      </div>
    </section>

    <section class="update__section background2">
      <form class="form-register" action="" method="POST">
        <h1 class="text-left">Editar Usuario</h1>
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
            <?php foreach ($documentTypes as $dc) : ?>
              <option <?php echo $dc == $user->documentType ? "selected" : ""; ?> value="<?php echo $dc ?>"><?php echo $dc ?></option>
            <?php endforeach; ?>
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
            <?php foreach ($countries as $country) : ?>
              <option <?php echo $country == $user->country ? "selected" : ""; ?> value="<?php echo $country ?>"><?php echo ucwords($country) ?></option>
            <?php endforeach; ?>
          </select>
        </td>
        <br>
        <td>
          <input class="btn" type="submit" name="Guardar" value="ACTUALIZAR">
        </td>
      </form>
    </section>
  </main>


</body>

</html>