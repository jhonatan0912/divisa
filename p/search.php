<?php
require_once __DIR__ . '/../bd/userController.php';

$documentoSearch = $_GET['buscar-por-documento'];

if (isset($documentoSearch)) {
  $datosCLiente = UserController::listarPorNombre($documentoSearch);
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
    <div class="datos-users">
      <table>
        <h1>RESULTADO BUSQUEDA:</h1>
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
        <tr>
          <td><?php echo ucwords($datosCLiente->userCode) ?></td>
          <td><?php echo ucwords($datosCLiente->name) ?></td>
          <td><?php echo $datosCLiente->lastName ?></td>
          <td><?php echo $datosCLiente->documentType ?></td>
          <td><?php echo $datosCLiente->document ?></td>
          <td><?php echo $datosCLiente->bornDate ?></td>
          <td><?php echo $datosCLiente->address ?></td>
          <td><?php echo $datosCLiente->country ?></td>
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