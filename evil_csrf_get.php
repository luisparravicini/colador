<?php require_once('includes/header.php'); ?>
<div id="center">
  <div class="article_wrapper">
    <h2>CSRF</h2>
    <div>
      <div>
        <iframe src="csrf_get.php?amount=50&amp;dest=123456" width="0" height="0" style="border:0"></iframe>
        <p>Ya sos $50 más pobre.</p>
        <p><a href="csrf_get.php">Volver</a></p>
      </div>
      <br/>
      <br/>
    </div>
  </div>
</div>

<div id="rightcolumn">
  <?php echo info_column('Información', 'Demostración de CSRF. La pantalla muestra el saldo de una cuenta bancaria y da la opcion de transferir dinero. El formulario evnía los datos usando GET. Más información en el capítulo 9.') ?>
</div>
<?php include('includes/footer.php'); ?>
