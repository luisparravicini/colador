<?php include('includes/header.php'); ?>
<?php
  $user = post_var('user');
  $passw = post_var('passw');
?>
<div id="center">
  <div class="article_wrapper">
    <h2>Ingreso</h2>
    <div class='login'>
      <form method="post" action="login.php">
        <table><tr>
        <td>Usuario:</td>
        <td><input type="text" id="user" name="user" value="<?php echo encode($user); ?>"/></td>
        </tr><tr>
        <td>Clave:</td>
        <td><input type="password" id="passw" name="passw" value="<?php echo encode($passw); ?>"/></td>
        </tr>
        </table>

        <input type="submit" id="login_btn" value="Ingresar" class='button'/>
      </form>
    </div>
  </div>
</div>

<div id="rightcolumn">
  <?php echo info_column('Información', '<p>Esta pantalla tiene el problema de permitir ilimitados intentos fallidos de ingreso. Ver capítulo x</a></p>') ?>
</div>

<script>
$(document).ready(function() {
  $('#user').focus();

  $('#login_btn').bind('click', function() {
    var ok = true;

    if (Colador.blankInput($('#user'))) {
      alert('Falta ingresar el nombre de usuario');
      $('#user').focus();
      ok = false;
    } else
    if (Colador.emptyInput($('#passw'))) {
      alert('Falta ingresar la clave');
      $('#passw').focus();
      ok = false;
    }

    return ok;
  });
});
</script>
<?php include('includes/footer.php'); ?>
