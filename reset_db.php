<?php
  require_once('includes/common.php');

  if (is_post()) {
    reset_db();
    redirect();
    return;
  }

  require('includes/header.php');
?>
<div id="center">
  <div class="article_wrapper">
    <h2>Resetear base de datos</h2>
      <p>¿Rompiste algo?</p>
		  <p>¿Querés una segunda oportunidad?</p>
      <p>¿Necesitás volver la base de datos al estado inicial?</p>
      <form method="post" action="reset_db.php">
        <input type="submit" value="Resetear" class='button'/>
      </form>
  </div>
</div>
<?php include('includes/footer.php'); ?>

