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
      <p class="title py-4 bg-blue-500 text-white w-80 m-auto mt-5 mb-5 rounded-3xl">Cambista al Paso S.A</p>
      <img class="img-mujer w-60 m-auto my-5" src="/imagenes/mujer.png" alt="">
      <p class="text-center w-96 m-auto">Somos una empresa dedicada a la compra-venta de divisas. Nos enfocamos en la atención al cliente de una manera afectiva, con equidad y respeto.</p>
      <br><br>
      <p class="text-center w-96 m-auto">Ofrecemos un servicio de confiabilidad y con garantía, buscando ampliar confianza y seguridad hacia nuestros clientes.</p>
    </section>

    <section class="main-content bg-gray-100 flex items-center justify-center flex-col">
      <form class="form-register w-80 mt-7" action="" method="POST">
        <h1 class="font-black text-xl text-left">REGISTRO USUARIOS</h1>
        <br>
        <br>

        <div class="flex flex-col">
          <label for=""> NOMBRES: <small class="text-red-500">(obligatorio)</small> </label>
          <input class="inputs-register bg-gray-300 rounded-lg p-0.5 outline-0" type="text" name="name" id="name" pattern="[A-Za-z]{1,50}" title="Solo debe considerar letras mayusculas o minusculas / Sin números" required>
        </div>

        <br>

        <div class="flex flex-col">
          <label for="">APELLIDOS:<small class="text-red-500">(obligatorio)</small>
          </label>
          <input class="inputs-register bg-gray-300 rounded-lg p-0.5 outline-0" type="text" name="lastName" id="lastName" pattern="[A-Za-z]{1,80}" title="solo debe considerar letras mayusculas o minusculas / Sin números" required>
        </div>

        <br>

        <div class="flex flex-col">
          <label for="">
            TIPO DOCUMENTO: <small class="text-red-500">(obligatorio)</small>
          </label>
          <select name="documentType" id="" required class="inputs-register bg-gray-300 rounded-lg p-0.5 outline-0">
            <option value="DNI" name="DNI">
              DNI
            </option>
            <option value="PASAPORTE" name="PASAPORTE">
              PASAPORTE
            </option>
          </select>
        </div>

        <br>
        <div class="flex flex-col">
          <label for="correo">
            DOCUMENTO: <small class="text-red-500">(obligatorio)</small>
          </label>
          <input class="inputs-register bg-gray-300 rounded-lg p-0.5 outline-0" type="number" name="document" min="1" minlength="8" maxlength="12" pattern="[0-9]" required>
        </div>

        <br>
        <div class="flex flex-col">
          <label for="">
            FECHA DE NACIMIENTO:
          </label>
          <input class="inputs-register bg-gray-300 rounded-lg p-0.5 outline-0" type="date" name="bornDate" max="2004-01-01" required>
        </div>
        <br>
        <div class="flex flex-col">
          <label for="">
            DIRECCION:
          </label>
          <input class="inputs-register bg-gray-300 rounded-lg p-0.5 outline-0" type="text" name="address">
        </div>
        <br>
        <div class="flex flex-col">
          <label for="">PAÍS:</label>
          <select name=" country" class="inputs-register bg-gray-300 rounded-lg p-0.5 outline-0">
            <option value="peru">Peru</option>
            <option value="colombia">Colombia</option>
            <option value="brasil">Brasil</option>
            <option value="chile">Chile</option>
            <option value="argentina">Argentina</option>
            <option value="otros">Otros</option>
          </select>
        </div>
        <br>
        <div class="flex flex-col">
          <div class="buttons flex justify-between">
            <input class="btn bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer" type="submit" name="registrar" value="REGISTRAR">
            <input class="btn bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer" type="reset" name="borrar" value="CANCELAR">
          </div>
          <a href="" class="underline text-center mt-5">pagina anterior</a>
        </div>
      </form>
  </main>
  <script src="./../src/assets/js/crear-usuario.js"></script>
</body>

</html>