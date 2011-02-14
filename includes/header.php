<?php require_once('includes/common.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Colador</title>
<link href="stylesheets/common.css" rel="stylesheet" type="text/css" />
<script src="javascripts/jquery.js"></script>
<script src="javascripts/jquery-ui-1.8.6.custom.min.js"></script>
<script src="javascripts/colador.js"></script>
</head>
<body>
	<div id="header">
		<div class="container">
			<h1><a href="index.php" title="Colador">Colador<span class='logo-border'></a></h1>
			<hr />
			<ul id="navigation">
				<li <?php echo active_item('index.php') ?>><a href="index.php" title="Inicio">Inicio</a></li>
				<li <?php echo active_item('reset_db.php') ?>><a href="reset_db.php" title="Resetear DB">Resetear DB</a></li>
			</ul>
			<hr />
			<div id="banner">
				Aplicación para demostrar problemas de seguridad comunes en aplicaciones web.
			</div>
			<hr />
		</div>
	</div>
	<div id="main" class="container">
    <?php include('includes/error_message.php'); ?>
		<div id="leftcolumn">
			<h3 class="leftbox">Ejemplos</h3>
			<ul class="leftbox borderedlist">
				<li><a href="login.php" title="Autenticación">Autenticación</a></li>
				<li><a href="xss.php" title="XSS">XSS</a></li>
				<li><a href="referer.php" title="Referer">Referer</a></li>
				<li><a href="comments.php" title="Comentarios">Comentarios</a></li>
			</ul>
			<h3 class="leftbox header_small">CSRF</h3>
			<ul class="leftbox borderedlist">
				<li><a href="csrf_get.php" title="CSRF usando GET">Usando GET</a></li>
				<li><a href="csrf_post.php" title="CSRF usando POST">Usando POST</a></li>
      </ul>
			<h3 class="leftbox header_small">Inyección de SQL</h3>
			<ul class="leftbox borderedlist">
				<li><a href="sql_injection_multiple.php" title="Inyección de SQL">Ejecución múltiple</a></li>
				<li><a href="sql_injection_select.php" title="Inyección básica">Inyección básica</a></li>
				<li><a href="sql_injection_second.php" title="Segundo orden">Segundo orden</a></li>
			</ul>
			<h3 class="leftbox header_small">Validaciones</h3>
			<ul class="leftbox borderedlist">
				<li><a href="discounts.php" title="Mega descuentos">Mega descuentos</a></li>
			</ul>
			<hr />
		</div>
