<?php  
	session_start();
	include_once 'database.php';
	include_once 'functions.php';
	if (!isset($_SESSION['usuario'])) {
		header("Location:index.php");
		die();
	}
	$id = $_GET['id'];
	if (!isset($id)) {
		header("Location:home.php");
	}
	
	$tablaApartamento = apartamentosPorBloque($id);
	$btns = count($tablaApartamento);
?> 

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SINE: Apartamentos</title>
	</head>
	<body>
		<a href="home.php">Inicio</a>
		<a href="statistics.php">Estadisticas</a>
		<a href="#">Buscar</a>
		<a href="exit.php">Cerrar Sesión</a>
		<h1>Bloque <?php echo "$id"?></h1>

		<?php for ($i = 0; $i < $btns; $i++): ?>
			<?php if ($tablaApartamento[$i]['ANEXO'] == 'N' || $tablaApartamento[$i]['ANEXO'] == 'n'): ?>
				<a href="families.php?id=<?php echo $tablaApartamento[$i]['ID'] ?>"><button>Apartamento <?php echo $tablaApartamento[$i]['NRO_APARTAMENTO'] ?></button></a>
			<?php endif ?>
			<?php if ($tablaApartamento[$i]['ANEXO'] == 'S' || $tablaApartamento[$i]['ANEXO'] == 's'): ?>
				<a href="families.php?id=<?php echo $tablaApartamento[$i]['ID'] ?>"><button>Anexo <?php echo $tablaApartamento[$i]['NRO_APARTAMENTO'] ?></button></a>
			<?php endif ?>
		<?php endfor; ?>
		<br><a href="home.php">Volver</a>
		<p>Ingeniera de Sistemas &copy;2020</p>
		<p>Version 0.1</p>
</html>