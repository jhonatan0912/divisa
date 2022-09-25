<?php
date_default_timezone_set('America/Lima');
$date = date("d/m/Y");
$time = date("h:i:sa");

if (isset($_POS['save'])) {
  $userCode = $_POST['userCode'];
  $document = $_POST['document'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $operation = $_POST['operation'];
  $typeOfDivisa = $_POST['typeOfDivisa'];
  $amount = $_POST['amount'];
  $changePrice = $_POST['changePrice'];
  $total = $_POST['total'];
}
?>
<!DOCTYPE html>
<html lang="ES-PE">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./registro-operaciones.css">
  <title>Registro de operaciones</title>
</head>

<body>
  <main>
    <form action="" method="POST">
      <fieldset class="first-row">
        <legend>OPERACIÓN</legend>
        <div class="first-row-items">
          <img class="img-input" src="./src/user.svg" alt="img-input">
          <input class="first-row-inputs text-right" type="text" disabled value="0001" name="userCode">
        </div>
        <div class="first-row-items">
          <img class="img-input" src="./src/calendar.svg" alt="img-input">
          <input class="first-row-inputs text-right" type="text" id="input-date" disabled name="date">
        </div>
        <div class="first-row-items">
          <img class="img-input" src="./src/clock.svg" alt="img-input">
          <input class="first-row-inputs text-right" type="text" id="input-time" disabled>
        </div>
      </fieldset>

      <fieldset class="second-row">
        <legend>DATOS</legend>
        <div class="second-row-items">
          <img class="img-input" src="./src/dni.svg" alt="documento">
          <input class="second-row-inputs" type="number" placeholder="Documento">
        </div>
        <div class="second-row-items border-none">
        </div>
        <div class="second-row-items">
          <img class="img-input" src="./src/user.svg" alt="user">
          <input class="second-row-inputs" type="text" placeholder="Nombres">
        </div>
        <div class="second-row-items">
          <img class="img-input" src="./src/mail.svg" alt="mail">
          <input class="second-row-inputs" type="text" placeholder="Apellidos">
        </div>
        <div class="second-row-items">
          <img class="img-input" src="./src/address.svg" alt="address">
          <input class="second-row-inputs" type="text" placeholder="Dirección">
        </div>
        <div class="second-row-items">
          <img class="img-input" src="./src/phone.svg" alt="phone">
          <input class="second-row-inputs" type="text" placeholder="Pais">
        </div>
      </fieldset>
      <fieldset class="third-row">
        <legend>OTRAS DIVISAS</legend>

        <div class="input-divisas">
          <div>
            <input type="radio" name="operation" id="compra" value="compra">
            <label for="compra">
              COMPRA
            </label>
          </div>
          <div>
            <input type="radio" name="operation" id="venta" value="venta">
            <label for="venta">VENTA</label>
          </div>
        </div>

        <div class="inputs-container">
          <div class="third-row-items">
            <img class="img-input" src="./src/bill.svg" alt="money">
            <input type="number" class="third-row-inputs">
          </div>
          <div class="third-row-items">
            <p>MONTO</p>
            <input type="number" class="third-row-inputs">
          </div>
          <div class="third-row-items">
            <p>TC</p>
            <input type="number" class="third-row-inputs">
          </div>
          <div class="third-row-items">
            <p>TOTAL</p>
            <input type="number" class="third-row-inputs">
          </div>
        </div>

        <div class="checkbox-container">
          <label class="label-checkbox" for="sospechosa">
            <input class="input-checkbox" type="radio" name="persona" value="sospechosa" id="sospechosa">
            Sospechosa
          </label>

          <label class="label-checkbox" for="inusual">
            <input class="input-checkbox" type="radio" name="persona" value="inusual" id="inusual">
            Inusual
          </label>

          <label class="label-checkbox" for="cambista">
            <input class="input-checkbox" type="radio" name="persona" value="cambista" id="cambista">
            Cambista
          </label>

          <label class="label-checkbox" for="normal">
            <input class="input-checkbox" type="radio" name="persona" value="normal" id="normal">
            Normal
          </label>
        </div>

        <div class="pay-container">
          <div class=" checkbox-container">
            <label for="">
              Pago:
            </label>
            <label class="label-checkbox" for="efectivo">
              <input class="input-checkbox" type="radio" name="pago" value="efectivo" id="efectivo">
              Efectivo
            </label>
            <label class="label-checkbox" for="transferencia">
              <input class="input-checkbox" type="radio" name="pago" value="transferencia" id="transferencia">
              Transferencia
            </label>
          </div>

          <div>
            <input type="submit" value="GUARDAR" name="save" class="btn-form">
            <input type="reset" value="BORRAR" name="reset" class="btn-form">
          </div>
        </div>

      </fieldset>

    </form>
  </main>
  <script src="/src/assets/js/registro-operaciones.js"></script>
</body>

</html>