<?php
  $VERSION = '20101129';

function redirect($path=null) {
  header('Status: 302 Found', true);
  if ($path == null)
    $path = $_SERVER['SCRIPT_NAME'];
  header("Location: $path", true);
}

function is_get() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function is_post() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function post_var($name) {
  return (isset($_POST[$name]) ? $_POST[$name] : "");
}

function get_var($name) {
  return (isset($_GET[$name]) ? $_GET[$name] : "");
}

function encode($str) {
  return htmlentities($str, ENT_QUOTES, 'UTF-8');
}

function info_column($title, $content) {
  return <<<EOT
  <div class="rightbox_wrapper">
    <div class="rightbox">
      <img src="images/colador.gif" alt="Colador te avisa" class="product_image" />
      <div class="product_wrapper">
        <h4>$title</h4>
        <p>$content</p>
      </div>
    </div>
  </div>
  <hr/>
EOT;
}

function active_item($name) {
  if (preg_match('/' . $name . '$/', $_SERVER['SCRIPT_NAME']))
    return 'class="active"';
}

function reset_db() {
  global $base_dir, $error_message;

  $error = !copy($base_dir . '/empty.db', $base_dir . '/colador.db');
  if ($error)
    $error_message = 'No se pudo copiar la base de datos. Ver capítulo 3 para posibles soluciones.';

  return !$error;
}


$base_dir = dirname($_SERVER['SCRIPT_FILENAME']);
$db_name = $base_dir . '/colador.db';
if (!file_exists($db_name))
  $db_replaced = reset_db();

if (isset($db_replaced) && !$db_replaced) {
  if (!preg_match('/error_db.php$/', $_SERVER['SCRIPT_NAME'])) {
    redirect('error_db.php');
    return;
  }
} else {
  $db = new SQLiteDatabase($db_name, 0664, $error);
  if (!$db)
    die($error);
}

?>
