<?php
  require('includes/common.php');

  // El caso mas común es relacionar a un usuario con los descuentos que
  // seleccionó. Pero para simplificar el ejemplo, no vamos a tener en cuenta
  // al usuario asumiendo un usuario único y tampoco vamos a tener una tabla
  // de artículos.
  // La tabla de descuentos solo contendrá entonces una lista de ids de
  // artículos.

  function flatten($value) { return intval($value[0]); }

  $MAX = 2;

  $ids = post_var('id');
  if (is_post()) {
    $db->query("DELETE FROM discounts");

    if ($ids)
      foreach ($ids as $id) {
        $id = intval($id);
        // Si no pudo convertir a entero, lo descartamos (además los
        // id de artículo son > 0).
        if (!$id) continue;

        $db->query("INSERT INTO discounts (article_id) VALUES(" . $id . ")");
      }

    redirect();
    return;
  }

  $selected_ids = $db->query("SELECT article_id FROM discounts")->fetchAll(SQLITE_NUM);
  $selected_ids = array_map('flatten', $selected_ids);

  require('includes/header.php');
?>
<div id="center">
  <div class="article_wrapper">
    <h2>Validaciones</h2>
    <p>Los artículos que ha seleccionado<br/>para recibir descuentos son
    (máximo<br/>de <?php echo $MAX ?> artículos):</p><br/>

  <form method="post" action="discounts.php">
    <table id="items"><tr><td>
<?php
  for ($i = 1; $i < 11; $i++) {
    if ($i == 6)
      echo "</td><td>";
    echo "<input type='checkbox' name='id[]' value='$i'";
    if (in_array($i, $selected_ids))
      echo "checked='checked' ";
    echo "/> Artículo $i<br/>\n";
  }
?>
    </td></tr></table>
    <input type="submit" class='button' id="submit_btn" value="Enviar"/>
  </form>
  </div>
</div>

<script type="text/javascript">
<![CDATA[
$(document).ready(function() {
  $('#submit_btn').click(function() {
    var checked = 0;
    $('input[type="checkbox"]').each(function() {
      if (this.checked) checked += 1;
    });

    if (checked > <?php echo $MAX ?>)
      alert('Debe seleccionar como máximo <?php echo $MAX ?> artículos');

    return (checked <= <?php echo $MAX ?>);
  });
});
]]>
</script>

<div id="rightcolumn">
  <?php echo info_column('Información', 'Demostración de validaciones presentes sólo en el navegador. Más información en el capítulo 7.') ?>
</div>
<?php include('includes/footer.php'); ?>
