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
				<img src="img/iem_1.jpg" /><img src="img/iem_2.jpg" />
			</div>

			<div class="sections" id="cursos">
				<h1><?php echo $traducciones['cursos']['cursos']  ?></h1>

				<p><?php echo $traducciones['cursos']['horarios']  ?></p>

				<p><?php echo $traducciones['cursos']['grupos1']  ?></p>

				<p><?php echo $traducciones['cursos']['grupos2']  ?></p>

				<p><?php echo $traducciones['cursos']['preparacion']  ?></p><br>

				<h1><?php echo $traducciones['cursos']['refuerzo']  ?></h1>

				<p><?php echo $traducciones['cursos']['niveles']  ?></p>

				<p><?php echo $traducciones['cursos']['libros']  ?></p>

				<p><?php echo $traducciones['cursos']['seguimiento']  ?></p>

				<p><?php echo $traducciones['cursos']['tecnicas']  ?></p>

			</div>
		</div>

		<footer>
			<?php include 'html/footer.html'; ?>
		</footer>
	</div>
</body>

</html>