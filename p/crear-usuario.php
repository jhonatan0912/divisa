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

  if ($id != FALSE) {
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
  <!-- <link rel="stylesheet" href="/src/assets/css/estilo-agregar-usuario.css"> -->
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Registro cliente</title>
</head>

<body>

  <header class="flex bg-zinc-700	text-white p-4">
    <nav class="menu-superior flex items-center gap-10">
      <div class="flex logo items-center gap-2">
        <a href="/">
          <img src="/imagenes/logo.png" alt="" class="w-20">
        </a>
        <span class="logo-text">
          <a href="">Cambista al Paso</a>
        </span>
      </div>
      <div class="menu">
        <h2 class="text-xl font-bold">ADMINISTRAR USUARIO</h2>
      </div>
    </nav>
  </header>

  <main class="page-content grid grid-cols-2">
    <section class="company-content bg-gray-300	text-center">
      <img class="img-logo w-32 m-auto mt-5" src="/imagenes/logo.png" alt="">
      <p class="title p-5 bg-red-600 text-white w-80 m-auto mt-5 mb-5 rounded-lg">Cambista al Paso S.A</p>
      <img class="img-mujer w-60 m-auto" src="/imagenes/mujer.png" alt="">
      <p>Somos una empresa dedicada a la compra-venta de divisas. Nos enfocamos en la atención al cliente de una manera afectiva, con equidad y respeto.</p>
      <br><br>
      <p>Ofrecemos un servicio de confiabilidad y con garantía, buscando ampliar confianza y seguridad hacia nuestros clientes.</p>
    </section>

    <section class="main-content bg-gray-100">
      <form class="form-register" action="" method="POST">
        <h1>REGISTRO USUARIOS</h1>
        <br>
        <br>
        <label for="">
          NOMBRES: <small>(obligatorio)</small>
        </label>
        <input class="inputs-register" type="text" name="name" id="name" pattern="[A-Za-z]{1,50}" title="Solo debe considerar letras mayusculas o minusculas / Sin números" required>
        <br>
        <label for="">
          APELLIDOS: <small>(obligatorio)</small>
        </label>
        <input class="inputs-register" type="text" name="lastName" id="lastName" pattern="[A-Za-z]{1,80}" title="solo debe considerar letras mayusculas o minusculas / Sin números" required>
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
          FECHA DE NACIMIENTO:
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
        <div class="buttons">
          <input class="btn" type="submit" name="registrar" value="REGISTRAR">
          <input class="btn" type="reset" name="borrar" value="CANCELAR">
        </div>
        <a href="">pagina anterior</a>
      </form>
  </main>
  <script src="./../src/assets/js/crear-usuario.js"></script>
</body>

</html>