<?php require_once('includes/header.php'); ?>
<div id="center">
  <div class="article_wrapper">
    <h2>CSRF</h2>
    <div>
      <div>
        <p id="status">Haciendo pedido...</p>
        <p><a href="csrf_post.php">Volver</a></p>
        <iframe src="evil_csrf_post_iframe.php" width="0" height="0" style="border:0"></iframe>
      </div>
      <br/>
      <br/>
    </div>
  </div>
</div>

<div id="rightcolumn">
  <?php echo info_column('Información', 'Demostración de CSRF. La pantalla muestra el saldo de una cuenta bancaria y da la opcion de transferir dinero. El formulario evnía los datos usando POST. Más información en el capítulo 9.') ?>
</div>

<script type="text/javascript">
  $('iframe').load(function() { $('#status').text('Ya sos $50 más pobre'); });
</script>

<?php include('includes/footer.php'); ?>
