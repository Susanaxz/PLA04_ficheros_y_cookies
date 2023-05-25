<!DOCTYPE html>
<html>

<?php

// idiomas contemplados
$idiomas = array('es', 'ca');

// idioma por defecto
$language_default = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

// idioma seleccionado válido
if (isset($_GET['lang']) && in_array($_GET['lang'], $idiomas)) {
	$language = $_GET['lang'];
	setcookie('lang', $language, time() + (86400 * 30), "/");
	if (isset($_GET['uri'])) {
		header('Location: ' . $_GET['uri']);
		exit;
	}
} else {
	$language = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : $language_default;
}

// guardar el idioma seleccionado en una cookie
setcookie('lang', $language, time() + (86400 * 30), "/");

// obtener el idioma de la cookie
$language = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'es';

// Cargar el archivo de idioma correspondiente al idioma actual
$language = 'lang/' . $language . '.php'; // Ruta al archivo de idioma según el idioma actual
if (file_exists($language)) {
	$loaded = require $language;
	$traducciones = $loaded['traducciones'];
	$header = $loaded['header'];
	$nav = $loaded['nav'];
	$footer = $loaded['footer'];
} else {
	$traducciones = require 'lang/es.php'; // Cargar el idioma por defecto en caso de error
}
?>

<head>
	<title>IEM</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/page.css" type="text/css" />
	<link rel="stylesheet" href="css/styles.css" type="text/css" />
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script src="js/page.js" type="text/javascript"></script>
	<script src="js/form.js" type="text/javascript"></script>
</head>

<body>
	<header>
		<?php include 'html/header.html'; ?>
	</header><br>
	<div class="wraper">
		<nav>
			<?php include 'html/nav.html'; ?>
		</nav>
		<div class="content">
			<div class="slider">
				<img src="img/iem_3.jpg" /><img src="img/iem_4.jpg" />
			</div>

			<div class="sections">
				<h1 style="text-align:center"><?php echo $traducciones['contacto']['localizacion']  ?></h1><br><br>
				<div class="contacto">
					<h2><?php echo $traducciones['contacto']['contacto'] ?></h2>
					<p><?php echo $traducciones['contacto']['obligatorios'] ?></p><br>
					<form id="form" name="form" method="get" action='#'>
						<label for="nombre"><?php echo $traducciones['contacto']['nombre'] ?></label><input type="text" name="nombre" autofocus id="nombre" /><br><br>
						<label for="email"><?php echo $traducciones['contacto']['email'] ?></label><input type="email" name="email" id="email" placeholder="nom@mail.com" /><br><br>
						<label for="telefono"><?php echo $traducciones['contacto']['telefono'] ?></label><input type="tel" name="telefono" id="telefono"><br><br>
						<label><?php echo $traducciones['contacto']['mensaje'] ?></label><br><br>
						<textarea id="mensaje" name="mensaje" placeholder="<?php echo $traducciones['contacto']['placeholder'] ?>"></textarea></textarea><br><br>
						<span><?php echo $traducciones['contacto']['privacidad'] ?></span><br><br>
						<input id="privacidad" type="checkbox" name="privacidad">&nbsp&nbsp
						<span id='ver' onclick="muestraAlert()"><?php echo $traducciones['contacto']['ver'] ?></span><br><br>
						<input id="enviar" type="button" name="enviar" value="<?php echo $traducciones['contacto']['enviar'] ?>" onclick="validaFormulario()" /><br>
					</form>

					<div id="alerta">
						<span id="alertatext"><?php echo $traducciones['contacto']['alerta'] ?><br><br>
							<input type="button" onclick="ocultaAlert()" />
					</div>
				</div>
			</div>
			<br><br>
		</div>

		<footer>
			<?php include 'html/footer.html'; ?>
		</footer>
	</div>
</body>

</html>