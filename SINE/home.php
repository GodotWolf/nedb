<?php  
	session_start();
	include_once 'database.php';
	include_once 'functions.php';
	if (!isset($_SESSION['usuario'])) {
		header("Location:index.php");
		die();
	}
	
	$name = $_SESSION['name'];
	$surname = $_SESSION['surname'];
	$tablaBloques = bloques();
	$btns = count($tablaBloques);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SINE: Panel Central</title>
	</head>
	<body>
		<a href="home.php">Inicio</a>
		<a href="statistics.php">Estadisticas</a>
		<a href="#">Buscar</a>
		<a href="#">Nuevo Usuario</a>
		<a href="exit.php">Cerrar Sesión</a>
		<?php if ((isset($name)) && (isset($surname))):?> <h1>Bienvenido, <?php echo $name." ".$surname ?> al panel de control</h1> <?php endif;?>
			<?php for ($i = 0; $i < $btns; $i++): ?>
				<a href="apartments.php?id=<?php echo $tablaBloques[$i]['ID']; ?>"><button>Bloque <?php echo $tablaBloques[$i]['NRO_BLOQUE']; ?></button></a>
			<?php endfor; ?>	
			<?php if (isset($message)): ?> <p> <?php echo $message; ?> </p> <?php endif; ?>
		<p>Ingeniera de Sistemas &copy;2020</p>
		<p>Version 0.1</p>
	</body>
</html>