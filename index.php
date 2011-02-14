<?php include('includes/header.php'); ?>
<div id="center">
  <div class="article_wrapper">
    <h2>Inicio</h2>
    <p>Colador es la aplicación usada en el libro <a href="">Programación web segura</a> para demostrar diferentes problemas de seguridad.</p>
    <p>Cada link de la columna de la izquierda (en <i>Ejemplos</i>) lleva a una página de un problema en particular.</p>
    <p>Si necesitás poner la base de datos en su estado inicial, usa el link de la barra superior <a href="reset_db.php">Resetear DB</a>.</p>
  </div>
</div>

<div id="rightcolumn">
  <?php echo info_column('Información', 'En esta columna aparecerá información adicional en las pantallas que lo necesiten.') ?>
</div>
<?php include('includes/footer.php'); ?>
