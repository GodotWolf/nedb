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
    $nro_ap = apartamento($id)['NRO_APARTAMENTO'];
    $id_ap = $id;
    $id_bl = apartamento($id)['ID_BLOQUE'];
    $apartamento = apartamento($id);
    $familias = familiasPorApartamento($apartamento['ID']);
    $personas;
    for ($i=0; $i < count($familias); $i++) {
        
        $p = personasPorFamilia($familias[$i]['ID']);
        for ($j=0; $j < count($p); $j++) { 
            $personas[$i][$j] = $p[$j];
        }
    }
    
?> 
<!--HTML-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SINE: Grupo Familiar</title>
    </head>
    <body>
        <a href="home.php">Inicio</a>
        <a href="statistics.php">Estadisticas</a>
        <a href="#">Buscar</a>
        <a href="exit.php">Cerrar Sesión</a>

        <h1>Apartamento <?php echo $nro_ap ?></h1>
            
            <?php if ($familias != null && isset($personas)): ?>
                <?php for ($i = 0; $i < count($familias); $i++):  ?>
                    <h1>Familia <?php echo $personas[$i][0]['FAMILIA'] ?></h1>
                    <table cellspacing="3" cellpadding="3" border="1"> 
                        <tr>
                            <thead>
                                <td><strong>ID</strong></td>
                                <td><strong>Nombres</strong></td>
                                <td><strong>Apellidos</strong></td>
                                <td><strong>Genero</strong></td>
                                <td><strong>DNI</strong></td>
                                <td><strong>Jefe de familia</strong></td>
                                <td><strong>Telefono</strong></td>
                                <td><strong>Fecha de nacimiento</strong></td>
                                <td><strong>Serial del Carnet de la Patria</strong></td>
                                <td><strong>Codigo del Carnet de la Patria</strong></td>
                                <td><strong>Editar</strong></td>
                                <td><strong>Eliminar</strong></td>
                            </thead>
                        </tr>

                        <?php for ($j = 0; $j < count($personas[$i]); $j++): ?>
                            <tr>
                                <td><?php echo $personas[$i][$j]['ID'] ?></td>
                                <td><?php echo $personas[$i][$j]['NOMBRES'] ?></td>
                                <td><?php echo $personas[$i][$j]['APELLIDOS'] ?></td>
                                <td><?php echo $personas[$i][$j]['GENERO'] ?></td>
                                <td><?php echo $personas[$i][$j]['DNI'] ?></td>
                                <td><?php echo $personas[$i][$j]['POSICION'] ?></td>
                                <td><?php echo $personas[$i][$j]['TELEFONO'] ?></td>
                                <td><?php echo $personas[$i][$j]['FECHA_NAC'] ?></td>
                                <td><?php echo $personas[$i][$j]['SERIAL_CARNET'] ?></td>
                                <td><?php echo $personas[$i][$j]['CODIGO_CARNET'] ?></td>
                                <td><a href="#"><button>...</button></a></td>
                                <td><a href="#"><button>...</button></a></td>
                            </tr>
                        <?php endfor ?>
                    </table>
                <?php endfor?>
                <?php else: echo "<h3>No hay gente</h3>" ?>
            <?php endif?>
        <a href="#"><button>Agregar Familia</button></a>
        
        <a href="apartments.php?id=<?php echo $id_bl ?>">Volver</a>
        <p>Ingeniera de Sistemas &copy;2020</p>
        <p>Version 0.1</p>
    </body>
</html>