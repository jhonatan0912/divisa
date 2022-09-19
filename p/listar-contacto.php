<?php
require_once __DIR__ . '/../bd/contactosAdapter.php';

$contactos = ContactoAdapter::listar();
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/../estilo.css">
  <title>LISTA DE CONTACTOS</title>
</head>

<body>
  <div class="datos-contactos">
    <table>
      <tr>
        <th>NOMBRES</th>
        <th>APELLIDOS</th>
        <th>EDAD</th>
        <th>CORREO</th>
        <th>TELEFONO</th>
        <th>EDITAR</th>
      </tr>
      <?php foreach ($contactos as $contacto) : ?>
        <tr>
          <td><?php echo ucwords($contacto->nombres) ?></td>
          <td><?php echo ucwords($contacto->apellidos) ?></td>
          <td><?php echo $contacto->edad ?></td>
          <td><?php echo $contacto->correo ?></td>
          <td><?php echo $contacto->telefono ?></td>
          <td>
            <a class="update colorWhite" href="/p/editar-contacto.php?idContacto=<?php echo $contacto->idContacto; ?>">Actualizar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>


</body>

</html>