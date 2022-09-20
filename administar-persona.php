<?php
require_once __DIR__ . '/bd/contactosAdapter.php';

$users = ContactoAdapter::listar();

// $cantidadContactos  = ContactoAdapter::countNumberContacts();
?>

<html lang="ES-PE">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/estilo.css">
  <!-- <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script> -->
  <title>Electronic Calendar</title>
</head>

<body>


  <div class="options">
    <div class="options-crud">

      <div class="new-register marginOptions backgroundWhite">
        <img class="img-options" src="/imagenes/user-plus-solid.svg">
        <a class="hover-a" href="/p/crear-contacto.php">
          Nuevo
        </a>
      </div>

      <div class="update marginOptions backgroundWhite">
        <img class="img-options" src="/imagenes/address-book-solid.svg">
        <a class="hover-a" href="/p/listar-contacto.php">
          Editar
        </a>
      </div>

      <!-- <div class="delete marginOptions backgroundWhite">
        <img class="img-options" src="/imagenes/ban-solid.svg">
        <a class="hover-a" href="/p/eliminar-contacto.php">
          Borrar
        </a>
      </div> -->
    </div>

    <form action="/p/search.php" method="GET">
      <div class="search">
        <label for="search-name">Filtrar por nombre:</label>

        <div class="search-submit-input">
          <input class="buscador" type="search" name="buscar-por-nombre" placeholder="Inserte nombre">
          <input class="estilos-search" type="submit" name="boton-buscar" value="Buscar">
        </div>
      </div>
    </form>
  </div>

  <div class="datos-contactos">
    <table>
      <tr>
        <th class="intercalado">CODIGO</th>
        <th class="intercalado2">NOMBRES</th>
        <th class="intercalado">APELLIDOS</th>
        <th class="intercalado2">TIPO DOCUMENTO</th>
        <th class="intercalado">DOCUMENTO</th>
        <th class="intercalado2">FECHA NACIMIENTO</th>
        <th class="intercalado">DIRECCION</th>
        <th class="intercalado2">PAIS</th>
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


  <!-- <div class="count-contacts">
    <p class="total-contacts">
      <?php //echo $cantidadContactos; 
      ?> USUARIOS
    </p>
  </div> -->



</body>

</html>