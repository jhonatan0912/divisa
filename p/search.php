<?php
require_once __DIR__ . '/../bd/contactosAdapter.php';

$nombresSearch = $_GET['buscar-por-nombre'];

if (isset($nombresSearch)) {
  $datosCLiente = ContactoAdapter::listarPorNombre($nombresSearch);
}
?>
<html lang="ES-PE">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/estilo.css">
  <title>Buscador</title>
</head>

<body>
  <?php if ($datosCLiente) : ?>
    <div class="datos-contactos">
      <table>
        <h1>RESULTADO BUSQUEDA:</h1>
        <tr>
          <th class="intercalado">NOMBRES</th>
          <th class="intercalado2 ">APELLIDOS</th>
          <th class="intercalado">EDAD</th>
          <th class="intercalado2 ">CORREO</th>
          <th class="intercalado">TELEFONO</th>
        </tr>
        <tr>
          <td><?php echo ucwords($datosCLiente->nombres) ?></td>
          <td><?php echo ucwords($datosCLiente->apellidos) ?></td>
          <td><?php echo $datosCLiente->edad ?></td>
          <td><?php echo $datosCLiente->correo ?></td>
          <td><?php echo $datosCLiente->telefono ?></td>
        </tr>
      </table>
    </div>
  <?php else : ?>
    <div class="contact-not-found">
      <h1 class="error-search">NO EXISTE ESE CONTACTO</h1>
    </div>
  <?php endif; ?>

</body>

</html>