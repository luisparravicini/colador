<?php require_once('includes/common.php'); ?>
<?php
  $multiple = post_var('multiple');

  if (is_post()) {
    $query = "INSERT INTO comments (msg) VALUES ('" . $multiple . "')";
    @$db->query($query, SQLITE_NUM, $error_message);
    if ($error_message)
      $error_message = "Ocurrió un error de SQL: " . $error_message;
    else {
      redirect();
      return;
    }
  }

  if (isset($error_message))
    $latest = array();
  else {
    $latest = @$db->query('SELECT msg FROM comments ORDER BY id DESC LIMIT 10',
      SQLITE_NUM, $error_message);
    if ($error_message) {
      $error_message = "Ocurrió un error de SQL: " . $error_message;
      $latest = array();
    } else
      $latest = $latest->fetchAll();
  }

  require('includes/header.php');
?>
<div id="center">
  <div class="article_wrapper">
    <h2>Inyección de SQL (m&uacute;ltiples sentencias)</h2>
    <div>
      <?php if (isset($query)) { ?>
      <div class='bordered'>
      <p>La sentencia SQL ejecutada fue:<br/><p><i><?php echo $query ?></i></p>
      </div>
      <?php } ?>

      <h3>Ultimos comentarios</h3>
      <div id="comments"><ul><?php foreach ($latest as $comment) { ?>
        <li><?php echo encode($comment[0])  ?></li>
      <?php } ?></ul></div>

      <hr/>

      <br/>
      <p>Deje su comentario:</p>
      <form method="post" action="sql_injection_multiple.php">
        <p><textarea name="multiple" cols="40" rows="5"><?php echo encode($multiple); ?></textarea></p>
        <input type="submit" value="Enviar" class='button'/>
      </form>
    </div>
  </div>
</div>

<div id="rightcolumn">
  <?php echo info_column('Información', 'Demostración de inyección de SQL usando de ejemplo una pantalla para agregar comentarios. El ejemplo específico sobre inyección de SQL es la ejecución de múltiples sentencias. Más información en el capítulo 10.') ?>
</div>
<?php include('includes/footer.php'); ?>
