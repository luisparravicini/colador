<?php require_once('includes/common.php'); ?>
<?php
  $error_message = null;

  // El usuario 1 es el usuario demo, suponemos que es el usuario logueado
  $user_id = 1;

  $amount = trim(post_var('amount'));
  $destination = trim(post_var('dest'));

  if (is_post()) {
    if ($destination == '')
      $error_message = "No se ingresó una cuenta destino.";
    else
      if (ctype_digit($amount)) {
        $amount = intval($amount);
        if ($amount <= 0)
          $error_message = "El monto deber ser un valor positivo.";
      } else
        $error_message = "Monto inválido. Sólo son aceptados números enteros.";


    if ($error_message == null) {
      // permitimos transferir más de lo que tiene de saldo
      $query = "UPDATE accounts SET balance = balance - $amount WHERE user_id=$user_id";
      $results = @$db->query($query, SQLITE_NUM, $error_message);
      if ($error_message)
        $error_message = "Ocurrió un error de SQL: " . $error_message;
      else
        redirect();
        return;
    }
  }

  $balance = $db->query("SELECT balance FROM accounts WHERE user_id=$user_id")->fetch(SQLITE_NUM);
  $balance = $balance[0];

  require('includes/header.php');
?>
<div id="center">
  <div class="article_wrapper">
    <h2>CSRF (POST)</h2>
    <div>
      <div>
        <p>Saldo en la cuenta: $<?php echo $balance ?></p>
        <span id="transfer-box">
        <strong><a href="#" id="transfer_btn">Transferir</a></strong>
        </span>
        <div id="transfer-form-box" style="display:none">
          <p>Realizar transferencia</p>
          <form action="csrf_post.php" method="post">
          <table><tr>
          <td>Monto:</td><td><input type="text" size="8" id="amount" name="amount" value="<?php echo $error_message != null ? encode($amount) : '' ?>" /></td>
          </tr><tr>
          <td>Cuenta destino:</td><td><input type="text" size="15" name="dest"/></td>
          </tr><tr><td colspan="2">
          <input type="submit" value="Confirmar" class='button' style="display:inline"/>
          <input type="button" value="Cancelar" id="cancel_btn" class='button button-right'/>
          </td></tr></table>
          </form>
        </div>
      </div>
      <br/>
      <br/>
      Ir a la <a href="evil_csrf_post.php">página con el ataque</a>.
    </div>
  </div>
</div>

<div id="rightcolumn">
  <?php echo info_column('Información', 'Demostración de CSRF. La pantalla muestra el saldo de una cuenta bancaria y da la opcion de transferir dinero. El formulario evnía los datos usando POST. Más información en el capítulo 9.') ?>
</div>

<script type="text/javascript">
function showTransfer() {
  $('#transfer-box').hide();
  $('#transfer-form-box').show();
  $('#amount').focus();
  return false;
}

$(document).ready(function() {
  $('#cancel_btn').click(function() {
    $('#transfer-form-box').hide();
    $('#transfer-box').show();
  });

  $('#transfer_btn').click(showTransfer);

  <?php if ($error_message != null): ?>
    showTransfer();
  <?php endif ?>
});
</script>

<?php include('includes/footer.php'); ?>
