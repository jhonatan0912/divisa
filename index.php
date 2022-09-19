<?php
require_once __DIR__ . '/bd/contactosAdapter.php';

$contactos = ContactoAdapter::listar();

$cantidadContactos  = ContactoAdapter::countNumberContacts();
?>

<html lang="ES-PE">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/estilo.css">
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

      <div class="delete marginOptions backgroundWhite">
        <img class="img-options" src="/imagenes/ban-solid.svg">
        <a class="hover-a" href="/p/eliminar-contacto.php">
          Borrar
        </a>
      </div>
    </div>

    <form action="/p/search.php" method="GET">
      <div class="search">
        <label for="search-name">Filtrar por nombre:</label>

        <div class="search-submit-input">
          <input class="buscador" type="search" name="buscar-por-nombre" placeholder="Inserte nombre">
          <input class="estilos-search" type="submit" name="boton-buscar" value="Buscar">
        </div>
      </div>
  </div>
  </form>

  <div class="datos-contactos">
    <table>
      <tr>
        <th class="intercalado">NOMBRES</th>
        <th class="intercalado2 ">APELLIDOS</th>
        <th class="intercalado">EDAD</th>
        <th class="intercalado2 ">CORREO</th>
        <th class="intercalado">TELEFONO</th>
      </tr>
      <?php foreach ($contactos as $contacto) : ?>
        <tr>
          <td><?php echo ucwords($contacto->nombres) ?></td>
          <td><?php echo ucwords($contacto->apellidos) ?></td>
          <td><?php echo $contacto->edad ?></td>
          <td><?php echo $contacto->correo ?></td>
          <td><?php echo $contacto->telefono ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>


  <div class="count-contacts">
    <p class="total-contacts">
      <?php echo $cantidadContactos; ?> CONTACTOS
    </p>
  </div>



</body>

</html>