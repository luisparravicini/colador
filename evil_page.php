<?php include('includes/header.php'); ?>
<?php
  $user = post_var('user');
  $passw = post_var('passw');
?>
<div id="center">
  <div class="article_wrapper">
    <h2>XSS (lado oscuro)</h2>
    <div>
      <p>Datos recibidos:</p>
      <p>Usuario: <?php echo encode($user) ?></p>
      <p>Clave: <?php echo encode($passw) ?></p>
      </form>
<br/>
    </div>
  </div>
</div>

<div id="rightcolumn">
  <?php echo info_column('Información', 'Ejemplo de XSS. Esta página es el destino del login falso generado con <a href="xss.php">XSS</a>. Para más información ver el capítulo X.') ?>
</div>
</div>
<?php include('includes/footer.php'); ?>

