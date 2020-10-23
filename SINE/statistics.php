<?php 
	session_start();
	include_once 'database.php';
	include_once 'testFunctions.php';
	if (!isset($_SESSION['usuario'])) {
		header("Location:index.php");
		die();
	}

	if (isset($_GET['grado'])) {
		if (($_GET['grado'] == 1 )||($_GET['grado'] == 4)) {
				$n = $_GET['grado'];
			} else {
				header("Location:statistics.php");
			}		
	}
	
	if (isset($_GET['operator'])) {
			$o = $_GET['operator'];
	}
	$exit = "";
	if (isset($o)) {
		switch ($o) {
			case 1:
				$lactantes = lactantes();
				if ($lactantes == false) {
					$message = "No hay lactantes en la base de datos.";
				} else {
					$message2 = "Lactantes";
					$rows = count($lactantes);
					$exit.= "<p>Lactantes<p><table cellspacing='3' cellpadding='3' border='1'>
								<thead> 
									<tr>
										<td>ID</td>
										<td>Nombre</td>
										<td>Aplelido</td>
										<td>Genero</td>
										<td>Fecha de Nacimiento</td>
										<td>Familia</td>
										<td>Numero de Bloque</td>
										<td>Numero de apartamento</td>
									</tr>
								</thead>
								<tbody>";
						for ($i=0; $i < $rows; $i++) { 
							$exit.="<tr>
				    					<td>".$lactantes[$i]['ID']."</td>
				    					<td>".$lactantes[$i]['NOMBRES']."</td>
				    					<td>".$lactantes[$i]['APELLIDOS']."</td>
				    					<td>".$lactantes[$i]['GENERO']."</td>
				    					<td>".$lactantes[$i]['FECHA_NAC']."</td>
				    					<td>".$lactantes[$i]['FAMILIA']."</td>
				    					<td>".$lactantes[$i]['NRO_BLOQUE']."</td>
				    					<td>".$lactantes[$i]['NRO_APARTAMENTO']."</td>
				    				</tr>";
						}
				}
				break;
			case 2:
				$estadoNutricion = estadoDeNutricion($n);
				if ($estadoNutricion == false) {
					$message = "No personas con desnutricion en la base de datos.";
				} else {
					if ($n == 1) {
						$message2 = "Casos de Desnutricion";
					} else if ($n == 4) {
						$message2 = "Casos de Obesidad";
					} else {
						header("Location:statistics.php");
					}
					
					$rows = count($estadoNutricion);
					$exit.= "<table cellspacing='3' cellpadding='3' border='1'>
								<thead> 
									<tr>
										<td>ID</td>
										<td>Nombre</td>
										<td>Aplelido</td>
										<td>Cedula</td>
										<td>Telefono</td>
										<td>Peso</td>
										<td>Estatura</td>
										<td>IMC</td>
										<td>Genero</td>
										<td>Familia</td>
										<td>Numero de Bloque</td>
										<td>Numero de apartamento</td>
									</tr>
								</thead>
								<tbody>";
						for ($i=0; $i < $rows; $i++) { 
							$exit.="<tr>
				    					<td>".$estadoNutricion[$i]['ID']."</td>
				    					<td>".$estadoNutricion[$i]['NOMBRES']."</td>
				    					<td>".$estadoNutricion[$i]['APELLIDOS']."</td>
				    					<td>".$estadoNutricion[$i]['DNI']."</td>
				    					<td>".$estadoNutricion[$i]['TELEFONO']."</td>
				    					<td>".$estadoNutricion[$i]['PESO']."</td>
				    					<td>".$estadoNutricion[$i]['ESTATURA']."</td>
				    					<td>".$estadoNutricion[$i]['IMC']."</td>
				    					<td>".$estadoNutricion[$i]['GENERO']."</td>
				    					<td>".$estadoNutricion[$i]['FAMILIA']."</td>
				    					<td>".$estadoNutricion[$i]['NRO_BLOQUE']."</td>
				    					<td>".$estadoNutricion[$i]['NRO_APARTAMENTO']."</td>
				    				</tr>";
						}
				}
				break;
			case 3:
				$message = "Error 408: Opcion no implementada.";
				break;
			case 4:
				$message = "Error 408: Opcion no implementada.";
				break;
			case 5:
				$message = "Error 408: Opcion no implementada";
				break;
			case 6:
				$message = "Error 408: Opcion no implementada.";
				break;

			default:
				header("Location:statistics.php");
				break;
		}
	}
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
		<a href="exit.php">Cerrar Sesión</a>
		<?php if (isset($message2)): ?>
			<h1><?php echo $message2; ?></h1>
			<?php else: ?>
		<h1>Central de Estadisticas</h1>
		<?php endif ?>
		<a href="statistics.php?operator=1">Lactantes</a>
		<a href="statistics.php?operator=2&grado=1">Casos de Desnutricion</a>
		<a href="statistics.php?operator=2&grado=4">Casos de Obesisdad</a>
		<!-- <a href="statistics.php?operator=3">Adultos Mayores</a> -->
		<!-- Creacion de una funcion para obtener a las mjeres mayores de 55 y hombres mayores de 60-->
		<!-- <a href="statistics.php?operator=4">Apartamentos con una sola persona</a> -->
		<!-- Actualizacion de la funcion llenarPersonas(); para que asigne bloque y familias-->
		<!-- <a href="statistics.php?operator=5">Personas no carnetizados</a> -->
		<!-- Actualizacion de la funcion tieneCarnet(); se requiere mas informacion -->
		<!-- <a href="statistics.php?operator=6">Embarazadas</a> --> 
		<!-- Actualizacion de funcion embarazada(); y de nedb se requiere conocer cunatos meses de embarazo -->

		<?php if (isset($message)): ?> <p> <?php echo $message; ?> </p> <?php endif; ?>
		<?php if (isset($exit)): ?> <p> <?php echo $exit; ?> </p> <?php endif; ?>
		<!-- http://localhost/Curso%20de%20Desarrollo%20WEB/SINE/test2.php?i1=a&i2=b&i3=c&i4=d&i5=e&btn1=Enviar -->

		<p>Ingeniera de Sistemas &copy;2020</p>
		<p>Version 0.1</p>
	</body>
</html>