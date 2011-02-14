<?php
  if (isset($_SERVER['HTTP_REFERER']))
    $referer = $_SERVER['HTTP_REFERER'];
?>
<?php include('includes/header.php'); ?>
<div id="center">
  <div class="article_wrapper">
    <h2>Referer</h2>
    <p id='referer_info'><?php if (isset($referer)) { ?>
      El referer recibido es:<br/><strong><?php echo $referer ?></strong>
    <?php } else { ?>
      No se recibió un referer.
    <?php } ?></p>
  </div>
</div>

<div id="rightcolumn">
<?php
//TODO reemplazar el resto de las columnas en otras paginas por info_column
?>
  <?php echo info_column('Información', 'El referer es un encabezado enviado por el navegador que indica el URL donde se encuentra el link al documento actual. Ver capítulo 1 para más información.'); ?>
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
