<?php require_once('includes/common.php'); ?>
<?php
  if (is_post()) {
    $new_city = trim(post_var('city'));
    if ($new_city == '')
      $new_city = 'ninguna';
    $result = $db->query("UPDATE users SET city='" . sqlite_escape_string($new_city) . "' WHERE id=1");
    redirect();
    return;
  }

  // El usuario 1 es el usuario demo
  $city = $db->query("SELECT city FROM users WHERE id=1")->fetch(SQLITE_NUM);
  $city = $city[0];

  $search = intval(get_var('search')) == 1;

  if ($search == 1) {
    $query = "SELECT name FROM users WHERE city = '$city'";
    $results = @$db->query($query, SQLITE_NUM, $error_message);
    if ($error_message) {
      $error_message = "Ocurrió un error de SQL: " . $error_message;
      $results = array();
    } else
      $results = $results->fetchAll();
  }

  require('includes/header.php');
?>
<div id="center">
  <div class="article_wrapper">
    <h2>Inyección de SQL (segundo orden)</h2>
    <div>
      <?php if (isset($query)) { ?>
      <div class='bordered'>
      <p>La consulta SQL ejecutada fue:<br/><p><i><?php echo $query ?></i></p>
      </div>
      <?php } ?>
      <div>
        Ciudad en la que vives: 
        <span id="city-span">
          <a href="#" id="edit_city" title="Editar"><?php echo encode($city) ?></a>
          <br/>
          <a href="?search=1">&iquest;Qui&eacute;nes viven en tu misma ciudad?</a>
        </span>
        <div id="city-edit-span" style="display:none">
          <form action="sql_injection_second.php" method="post">
            <input type="text" size="20" name="city" value="<?php echo encode($city) ?>"/>
            <br/>
            <input type="submit" value="Guardar" class='button'/>
            <input type="button" value="Cancelar" id="cancel_btn" class='button'/>
          </form>
        </div>
      </div>
      <br/>
      <br/>

<?php if (isset($query)) { ?>
      <div>
      <h3>Usuarios:</h3>
      <div id="comments"><ul><?php foreach ($results as $result) { ?>
        <li><?php echo encode($result[0])  ?></li>
      <?php } ?></ul></div>

      <hr/>
      </div>
<?php } ?>
    </div>
  </div>
</div>

<div id="rightcolumn">
  <?php echo info_column('Información', 'Demostración de inyección de SQL de segundo orden. El ejemplo específico es guardar datos que contengan una inyeccion de SQL y que luego la aplicacion los use para generar una consulta. Más información en el capítulo 10.') ?>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('#cancel_btn').click(function() {
    $('#city-edit-span').hide();
    $('#city-span').show();
  });

  $('#edit_city').click(function() {
    $('#city-span').hide();
    $('#city-edit-span').show();
  });
});
</script>
<?php include('includes/footer.php'); ?>
