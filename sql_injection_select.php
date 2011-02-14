<?php require_once('includes/common.php'); ?>
<?php
  $q = trim(get_var('query'));

  if ($q != '') {
    $query = "FROM catalog WHERE public=1 AND description LIKE '%$q%'";
    $count = @$db->query("SELECT COUNT(1) $query", SQLITE_NUM, $error_message);
    if ($error_message) {
      $results = array();
      $count = 0;
      $error_message = "Ocurrió un error de SQL: " . $error_message;
    } else {
      $count = $count->fetch();
      $count = $count[0];
      $query = "SELECT * $query";
      $results = $db->query($query);
    }
  } else {
    $results = array();
    $count = 0;
  }

  require('includes/header.php');
?>
<div id="center">
  <div class="article_wrapper">
    <h2>Inyección de SQL (SELECT)</h2>
    <div>
      <?php if (isset($query)): ?>
      <div class='bordered'>
      <p>La consulta ejecutada fue:<br/><p><i><?php echo $query ?></i></p>
      </div>
      <?php endif ?>
      <form action="sql_injection_select.php" method="get">
      <input type="text" size="30" name="query" value="<?php echo encode($q) ?>"/>
      <input type="submit" value="Buscar" class='button button-right'/>
      </form>
      <br/>

      <?php if (isset($query)): ?>
      <p>Hay <?php echo $count ?> resultados.</p>
      <div id="comments"><ul><?php foreach ($results as $result) { ?>
        <li><?php echo encode($result[0]) ?></li>
      <?php } ?></ul></div>
      <?php endif ?>

      <hr/>
    </div>
  </div>
</div>

<div id="rightcolumn">
<?php
//TODO chequear que todas las paginas sean validas con validator.w3.org
?>
  <?php echo info_column('Información', 'Demostración de inyección de SQL. El ejemplo específico es modificar el SELECT hecho por el buscador por medio de lo ingresado en la búsqueda.') ?>
</div>
</div>
<?php include('includes/footer.php'); ?>
