<?php
require_once __DIR__ . '/../bd/userController.php';

$users = UserController::listar();
$usersRegistered = UserController::countNumberContacts();

?>

<html lang="ES-PE">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/src/assets/css/estilo.css">
  <title>Administacion de usuarios</title>
</head>

<body>

  <header class="admin-users-header">
    <div>
      <a href="/">
        <img src="/imagenes/logo.png" alt="logo" class="logo-header">
      </a>
    </div>
    <div>
      <h2>Cambista al paso <br> S.A</h2>
    </div>
    <div>
      <h1>ADMINISTRACIÓN DE USUARIOS</h1>
    </div>

  </header>
  <main class="main-admin-user">
    <aside class="navigation-admin">
      <a href="#" class="btn-navigation">
        Administrar usuarios
      </a>
      <a href="#" class="btn-navigation">
        Reporte
      </a>
      <a href="#" class="btn-navigation">
        Registro de operaciones
      </a>
      <a href="#" class="btn-navigation">
        Tipo de cambio
      </a>

    </aside>
    <div class="datos-users">
      <div class="options">
        <div>
          <?php echo $usersRegistered . "&nbsp;&nbsp;&nbsp;" . "usuarios registrados"; ?>
        </div>
        <div class="options-crud">

          <div class="btn-admin">
            <img class="img-options" src="/imagenes/user-plus-solid.svg">
            <a class="hover-a" href="/p/crear-usuario.php">
              Agregar
            </a>
          </div>

          <div class="btn-admin">
            <img class="img-options" src="/imagenes/address-book-solid.svg">
            <a class="hover-a" href="/p/listar-usuario.php">
              Editar
            </a>
          </div>



          <form action="/p/search.php method=" GET">
            <div class="search oculto" id="form-search">
              <span id="close">X</span>
              <label for="search-name">Filtrar por documento:</label>

              <div class="search-submit-input">
                <input class="buscador" type="search" name="buscar-por-documento" placeholder="Inserte documento">
                <input class="estilos-search" type="submit" name="boton-buscar" value="Buscar">
              </div>
            </div>
          </form>
          <img id="search-icon" src="/imagenes/search.svg" alt="search icon">
        </div>

      </div>

      <table>
        <tr>
          <th class="intercalado colorWhite">CODIGO</th>
          <th class="intercalado colorWhite">NOMBRES</th>
          <th class="intercalado colorWhite">APELLIDOS</th>
          <th class="intercalado colorWhite">TIPO DOCUMENTO</th>
          <th class="intercalado colorWhite">DOCUMENTO</th>
          <th class="intercalado colorWhite">FECHA NACIMIENTO</th>
          <th class="intercalado colorWhite">DIRECCION</th>
          <th class="intercalado colorWhite">PAIS</th>
        </tr>
        <?php foreach ($users as $user) : ?>
          <tr>

            <td>
              <?php echo ucwords($user->userCode) ?>
            </td>
            <td>
              <?php echo ucwords($user->name) ?>
            </td>
            <td>
              <?php echo ucwords($user->lastName) ?>
            </td>
            <td>
              <?php echo ucwords($user->documentType) ?>
            </td>
            <td>
              <?php echo ucwords($user->document) ?>
            </td>
            <td>
              <?php echo ucwords($user->bornDate) ?>
            </td>
            <td>
              <?php echo ucwords($user->address) ?>
            </td>
            <td>
              <?php echo ucwords($user->country) ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </main>
  <script src="/src/assets/js/administrar-persona.js"></script>
</body>

</html>