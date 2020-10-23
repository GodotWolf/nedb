<?php  
    session_start();
    include_once 'database.php';
    include_once 'testFunctions.php';
    if (!isset($_SESSION['usuario'])) {
        header("Location:index.php");
        die();
    }
    $id = $_GET['id'];
    if (!isset($id)) {
        header("Location:home.php");
    }
    $nro_ap;
    $id_ap;
    $id_bl;
    $familias;
    $sql = "SELECT * FROM apartamento WHERE ID = '$id'";
        $res = $conexion->query($sql);
            if ($res->num_rows > 0) {
                $rw = $res->fetch_assosc();
                $nro_ap = $rw['NUMERO_APARTAMENTO'];
                $id_ap = $rw['ID'];
                $id_bl = $rw['ID_BLOQUE'];
                $sql = "SELECT * FROM familia WHERE ID_APARTAMENTO = '$id'";
                    $res = $conexion->query($sql);
                        if ($res->num_rows > 0) {
                            $i = 0;
                            while ($row = $res->fetch_assoc()) {
                                $tablaFamilia[$i]['ID'] = $row['ID'];
                                $i++;
                            }
                        for ($i = 0; $i < count($tablaFamilia); $i++) {
                            $id_familia = $tablaFamilia[$i]['ID'];
                            $sql2 = "SELECT * FROM persona WHERE ID_FAMILIA = '$id_familia'";
                            $res2 = $conexion->query($sql2);
                            if  ($res2->num_rows > 0) {
                                $j = 0;
                                $tablaPersona = null;
                                while ($row2 = $res2->fetch_assoc()) {
                                    
                                    $tablaPersona[$j]['ID'] = $row2['ID'];
                                    $tablaPersona[$j]['NOMBRES'] = $row2['NOMBRES'];
                                    $tablaPersona[$j]['APELLIDOS'] = $row2['APELLIDOS'];
                                    $tablaPersona[$j]['GENERO'] = $row2['GENERO'];
                                    $tablaPersona[$j]['DNI'] = $row2['DNI'];
                                    $tablaPersona[$j]['JEFE_FAMILIA'] = $row2['JEFE_FAMILIA'];
                                    $tablaPersona[$j]['TELEFONO'] = $row2['TELEFONO'];
                                    $tablaPersona[$j]['FECHA_NAC'] = $row2['FECHA_NAC'];
                                    $j++;
                                }
                                $familias[$i] = $tablaPersona;                                
                            } else {
                                $message = "No hay personas asignadas a las familias de este apartamento";    
                            }
                        }
                            $conexion->close();
                        } else {
                            $message = "No hay familias asignadas a este apartamento";
                        }
            } else {
                header("Location:home.php");
                die();
            }
?> 
<!--HTML-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SINE: Panel Central</title>
    </head>
    <body>
        <a href="home.php">Inicio</a>
        <a href="#">Estadisticas</a>
        <a href="#">Consultar</a>
        <a href="exit.php">Cerrar Sesión</a>

        <h1>Apartamento <?php echo $nro_ap ?></h1>

        <?php  if(isset($id_familia)): ?>
            
            <?php if(isset($tablaPersona)): ?> 

                <?php for ($i = 0; $i < count($tablaFamilia); $i++):  ?>
                    <?php for ($j = 0; $j < count($familias[$i]); $j++): ?>
                        <?php $jefe = $familias[$i][$j]['JEFE_FAMILIA']; ?>
                        <?php if ( $jefe == "S" || $jefe  == "s"): ?>
                            <h1>Familia <?php echo $familias[$i][$j]['APELLIDOS'] ?></h1>
                        <?php endif ?>
                    <?php endfor ?>
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
                                <td><strong>Editar</strong></td>
                                <td><strong>Eliminar</strong></td>
                            </thead>
                        </tr>

                        <?php for ($j = 0; $j < count($familias[$i]); $j++): ?>
                            <tr>
                                <td><?php echo $familias[$i][$j]['ID'] ?></td>
                                <td><?php echo $familias[$i][$j]['NOMBRES'] ?></td>
                                <td><?php echo $familias[$i][$j]['APELLIDOS'] ?></td>
                                <td><?php echo $familias[$i][$j]['GENERO'] ?></td>
                                <td><?php echo $familias[$i][$j]['DNI'] ?></td>
                                <td><?php echo $familias[$i][$j]['JEFE_FAMILIA'] ?></td>
                                <td><?php echo $familias[$i][$j]['TELEFONO'] ?></td>
                                <td><?php echo $familias[$i][$j]['FECHA_NAC'] ?></td>
                                <td><a href="#"><button>...</button></a></td>
                                <td><a href="#"><button>...</button></a></td>
                            </tr>
                        <?php endfor; ?>
                    </table>
                <?php endfor; ?>
            <?php endif ?>
        <?php  else: ?>
         <p>En este apartamento no hay una familia asignada</p>
        <?php endif ?>
        <?php if (isset($message)): ?>
                <p> <?php echo $message; ?> </p>
        <?php endif; ?>
        
        <a href="apartments.php?id=<?php echo $id_bl ?>">Volver</a>
        <p>Ingeniera de Sistemas &copy;2020</p>
        <p>Version 0.1</p>
    </body>
</html>