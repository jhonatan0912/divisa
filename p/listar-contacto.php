<?php
require_once __DIR__ . '/../bd/contactosAdapter.php';

$users = ContactoAdapter::listar();
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/../estilo.css">
  <title>LISTA DE USUARIOS</title>
</head>

<body>
  <!-- <header>
    <form action="/p/search.php" method="GET">
      <div class="search">
        <label for="search-name">Filtrar por nombre:</label>

        <div class="search-submit-input">
          <input class="buscador" type="search" name="buscar-por-nombre" placeholder="Inserte nombre">
          <input class="estilos-search" type="submit" name="boton-buscar" value="Buscar">
        </div>
      </div>
    </form>
  </header> -->



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
        <th class="intercalado">ACCIÓN</th>
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
          <td>
            <a class="update colorWhite" href="/p/editar-contacto.php?idUser=<?php echo $user->idUser; ?>">Actualizar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>


</body>

</html>