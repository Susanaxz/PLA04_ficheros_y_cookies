<!DOCTYPE html>
<html>


<?php
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

			<div class="sections" id="index">
				<h1><?php echo $traducciones["escuela_idiomas"]; ?></h1>
				<p><img alt="" src="img/IEM_logo.png" style="float:left; height:130px; margin-left:5px; margin-right:5px; width:130px">
				<p><?php echo $traducciones['descripcion']; ?></p>
				<p><?php echo $traducciones['intereses']; ?></p>
				<p><?php echo $traducciones['actualmente']; ?></p>
			</div>
			<br><br>
		</div>

		<footer>
			<?php include 'html/footer.html'; ?>
		</footer>
	</div>
</body>

</html>