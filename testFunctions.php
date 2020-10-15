<?php
/*
#Para acceder a los valores de las tablas (leer primero la descripcion de las funciones para saber cuales aplican para esta explicación, linea 24) usar la siguiente forma:

#Guardar en una variable:

$tablaPersonas = personas('ID',0);

#En caso de que queramos acceder al valor de la columna NOMBRES de la primera fila sería:

echo $tablaPersonas[0]['NOMBRES'];

#En caso de querer acceder a la segunda fila sería:

echo $tablaPersonas[1]['NOMBRES'];

#Y así...
	
#En caso de un arreglo no hacen falta los corchetes con el numero:
	
$tablaPersona = persona(1);
echo $tablaPersona['NOMBRES'];

### Lista de funciones ###

*->	validarUsuario($user,$pass)
Esta funcion permite saber si los datos de usuario ingresados son correctos, puede retornar uno de tres valores: 0, 1, o 2.
Retornará 0 si el usuario no existe en la base de datos, retornará 1 si existe pero la contraseña es incorrecta, y retornará 2 si los
datos son correctos
Forma de ejemplo para utilizar (copiar y pegar):

	switch(validarUsuario("admin","1234")){
		case 0:
			#Codigo en caso de que la cuenta no exista
			break;
		case 1:
			#Codigo en caso de que la contraseña sea incorrecta
			break;
		case 2:
			#Codigo en caso de que los datos ingresados sean validos
			break;
	}

*->	llenarPersonasRandom($integer)
Esta funcion es para pruebas, genera un numero $integer de filas en la tabla PERSONAS, dando valores para las columnas NOMBRES, APELLIDOS, GENERO, DNI, TELEFONO, EMBARAZO, BONO, PENSIONADO, VOTO, FECHA_NAC, PESO y ESTATURA

*->	bloques($filter,$binary)	o	bloques($filter)	o	bloques()
Esta funcion devuelve una tabla con las siguientes columnas
###################
# ID # NRO_BLOQUE #
###################
- Se le debe pasar como primer argumento el nombre de una columna, el cual se usará para ordenar la tabla de acuerdo a la misma (Si no estas seguro coloca "ID")
- Se le debe pasar como segundo argumento un valor binario (0 o 1): Colocar 0 para ordenar la tabla de forma ascendente, y 1 para ordenarla de forma descendente
- Si no se le pasa ningún argumento, se tomará por defecto los valores "ID" y 0

*-> bloque($id)
Las mismas columnas de la funcion anterior, pero en lugar de una tabla, devuelve un arreglo, ya que es para hallar los datos de un bloque en especifico mediante su ID.

*->	apartamentos($filter,$binary)	o	apartamentos($filter)	o	apartamentos()
Esta funcion devuelve una tabla con las siguientes columnas
#################################################
# ID # NRO_APARTAMENTO # ID_BLOQUE # NRO_BLOQUE #
#################################################
- Se le debe pasar como primer argumento el nombre de una columna, el cual se usará para ordenar la tabla de acuerdo a la misma (Si no estas seguro coloca "ID")
- Se le debe pasar como segundo argumento un valor binario (0 o 1): Colocar 0 para ordenar la tabla de forma ascendente, y 1 para ordenarla de forma descendente
- Si no se le pasa ningún argumento, se tomará por defecto los valores "ID" y 0

*-> apartamentosPorBloque($id_bloque)
Esta funcion envia una tabla igual a la de la funcion anterior, pero con los apartamentos de un determinado bloque

*-> apartamento($id)
Las mismas columnas de la funcion anterior, pero en lugar de una tabla, devuelve un arreglo, ya que es para hallar los datos de un apartamento en especifico mediante su ID.

*->	familias($filter,$binary)	o	familias($filter)	o	familias()
Esta funcion devuelve una tabla con las siguientes columnas
############################################################################
# ID # ID_JEFE # ID_APARTAMENTO # NRO_APARTAMENTO # ID_BLOQUE # NRO_BLOQUE #
############################################################################
- Se le debe pasar como primer argumento el nombre de una columna, el cual se usará para ordenar la tabla de acuerdo a la misma (Si no estas seguro coloca "ID")
- Se le debe pasar como segundo argumento un valor binario (0 o 1): Colocar 0 para ordenar la tabla de forma ascendente, y 1 para ordenarla de forma descendente
- Si no se le pasa ningún argumento, se tomará por defecto los valores "ID" y 0

*->	familiasPorApartamento($id_apartamento)
Esta funcion envia una tabla igual a la de la funcion anterior, pero con las familias de un determinado apartamento

*-> familia($id)
Las mismas columnas de la funcion anterior, pero en lugar de una tabla, devuelve un arreglo, ya que es para hallar los datos de una familia en especifico mediante su ID.

*->	personas($filter,$binary)	o	personas($filter)	o	personas()
Esta funcion devuelve una tabla con las siguientes columnas
######################################################################################################################
# ID # NOMBRES # APELLIDOS # GENERO # DNI # TELEFONO # EMBARAZO # JEFE_FAMILIA # LACTANTE # BONO # PENSIONADO # VOTO #
#########################################################################################################################
# FECHA_NAC # PESO # ESTATURA # SERIAL_CARNET # CODIGO_CARNET # ID_FAMILIA # FAMILIA # ID_APARTAMENTO # NRO_APARTAMENTO #
#########################################################################################################################
# ID_BLOQUE # NRO_BLOQUE #
##########################
- La columna FAMILIA muestra en realidad los apellidos del jefe de familia, de la familia a la cual pertenece esa persona
- Se le debe pasar como primer argumento el nombre de una columna, el cual se usará para ordenar la tabla de acuerdo a la misma (Si no estas seguro coloca "ID")
- Se le debe pasar como segundo argumento un valor binario (0 o 1): Colocar 0 para ordenar la tabla de forma ascendente, y 1 para ordenarla de forma descendente
- Si no se le pasa ningún argumento, se tomará por defecto los valores "ID" y 0

*-> personasPorFamilia($id_familia)
Esta funcion envia una tabla igual a la de la funcion anterior, pero con las personas de una determinada familia

*->	persona($id)
Las mismas columnas de la funcion anterior, pero en lugar de una tabla, devuelve un arreglo, ya que es para hallar los datos de una persona en especifico mediante su ID.

*->	recibenBonos($boolean)
Esta funcion devuelve una tabla con las siguientes columnas
############################
# ID # NOMBRES # APELLIDOS #
############################
- Si se le pasa TRUE como argumento, se recibirán las personas que reciben bonos
- Si se le pasa FALSE como argumento, se recibirán las personas que no reciben bonos

*->	pensionados($filter)
Esta funcion devuelve una tabla con las siguientes columnas
############################
# ID # NOMBRES # APELLIDOS #
############################
- Si se le pasa ALL como argumento, se recibirán las personas que son pensionados de cualquier tipo
- Si se le pasa AM como argumento, se recibirán las personas que son pensionados por adulto mayor
- Si se le pasa SS como argumento, se recibirán las personas que son pensionados por seguro social
- Si se le pasa NT como argumento, se recibirán las personas que no son pensionados

*->	embarazadas($boolean)
Esta funcion devuelve una tabla con las siguientes columnas
############################
# ID # NOMBRES # APELLIDOS #
############################
- Si se le pasa TRUE como argumento, se recibirán las mujeres que están embarazadas
- Si se le pasa FALSE como argumento, se recibirán las mujeres que no están embarazadas

*->	tienenCarnet($boolean)
Esta funcion devuelve una tabla con las siguientes columnas
(Si se pasa TRUE como argumento)
############################################################
# ID # NOMBRES # APELLIDOS # SERIAL_CARNET # CODIGO_CARNET #
############################################################
- Si se le pasa TRUE como argumento, se recibirán las personas que tienen carnet
(Si se pasa FALSE como argumento)
############################
# ID # NOMBRES # APELLIDOS #
############################
- Si se le pasa FALSE como argumento, se recibirán las personas que no tienen carnet

*->	bombonas($filter,$binary)	o	bombonas($filter)	o	bombonas()
Esta funcion devuelve una tabla con las siguientes columnas
######################################################
# ID # ID_TIPO # ID_MARCA # ID_FAMILIA # NOMBRE_JEFE #
######################################################
- Se le debe pasar como primer argumento el nombre de una columna, el cual se usará para ordenar la tabla de acuerdo a la misma (Si no estas seguro coloca "ID")
- Se le debe pasar como segundo argumento un valor binario (0 o 1): Colocar 0 para ordenar la tabla de forma ascendente, y 1 para ordenarla de forma descendente
- Si no se le pasa ningún argumento, se tomará por defecto los valores "ID" y 0

*-> bombona($id)
Las mismas columnas de la funcion anterior, pero en lugar de una tabla, devuelve un arreglo, ya que es para hallar los datos de una bombona en especifico mediante su ID.

*->	apartamentosConUnaPersona()
Funcion muy específica, que devuelve una tabla con las siguientes columnas
#################################################
# ID_APARTAMENTO # ID_PERSONA # NOMBRE_COMPLETO #
#################################################
- Devuelve una tabla con la ID de aquellos apartamentos donde solo vive una familia, y que esta a su vez está conformada por una sola persona

### Funciones mas evidentes ._. ###

*->	agregarProgramaSocial($nombre)

*->	atribuirProgramaSocial($id_programa, $id_persona)

*->	agregarTipoDiscapacidad($tipo)

*->	atribuirDiscapacidad($id_tipo, $id_persona)

*->	agregarBombona($id_familia, $id_tipo, $id_marca)

*->	agregarFamilia($id_apartamento)

*->	agregarAnexo($nro_apartamento, $id_bloque)

*->	registrarEntregaBeneficio($fecha_entrega, $id_familia)

*->	nuevoUsuario($user, $pass)

*-> agregarPersona($nombres, $apellidos, $genero, $dni, $telefono, $embarazo, $jefefamilia, $lactante, $bono, $pensionado, $voto, $fechanac, $peso, $estatura, $serialcarnet, $codigocarnet, $id_familia)

Todas estas funciones retornan un booleano (TRUE/FALSE) dependiendo de si se pudo realizar la insercion o no.
Utilizar de esta forma:

#EJEMPLO#
if ( agregarProgramaSocial("Nombre de programa social") ){
	echo "Si se pudo";
	# Colocar aquí todo el codigo para cuando la operacion sea exitosa
} else {
	echo "Ha ocurrido un error: comprueba que has escrito la informacion correctamente y que esta no se repita en la base de datos";
	# Colocar aquí todo el codigo para cuando la operacion no se pueda realizar
}
#EJEMPLO#

En la funcion agregarPersona, en el caso de los argumentos de tipo String o Char, deben enviarse con ambos tipos de comillas. Si no desea pasar todos los valores, rellenar con "NULL" (con las comillas) aquellos campos que no se definirán aun.

#EJEMPLO#
agregarPersona("'Nombre'", "'Apellido'", "'M'", 28289580, "NULL", "'N'", "'N'", "'N'", "'N'", "'N'", "'O'", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL");
#EJEMPLO#


### Miscelaneo ###

*->	count() 	(La trae por defecto PHP)
Devuelve el tamaño de un arreglo/tabla, puede utilizarse de la siguiente forma:
#EJEMPLO#
echo "Cantidad de personas registradas: ".count(personas('ID',0));
echo "Cantidad de personas pensionadas: ".count(pensionados(true));
echo "Cantidad de mujeres embarazadas: ".count(embarazadas(true));
echo "Cantidad de apartamentos donde solo vive una persona: ".count(apartamentosConUnaPersona());
#EJEMPLO#
	

*/

	function conexion(){
		#Cambiar estos valores según haga falta
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "nedb";
		$conection = new mysqli($servername, $username, $password, $dbname);
		if ($conection->connect_error)	die("Connection failed: " . $conection->connect_error);
		return $conection;
	}
	function validarUsuario($user, $pass){
		$conn = conexion();
		$sql = "SELECT NOMBRE, CLAVE FROM USUARIO WHERE NOMBRE = '$user'";
		$result = $conn->query($sql);

		$aux;
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			if ($pass == $row['CLAVE'])	$aux = 2;
			else	$aux = 1;
		}
		else	$aux = 0;
		$conn->close();
		return $aux;
	}
	function nuevoUsuario($user, $pass){
		$conn = conexion();
		$sql = "INSERT INTO USUARIO (NOMBRE, CLAVE) VALUES ('$user', '$pass')";

		$aux;
		if ($conn->query($sql) === TRUE)	$aux = TRUE;
		else	$aux = FALSE;
		$conn->close();
		return $aux;
	}
	function llenarPersonasRandom($integer){
		$conn = conexion();

		$nombre[0] = "Jose";	$nombre[1] = "Juan";	$nombre[2] = "Julian";	$nombre[3] = "Pedro";	$nombre[4] = "Robert";
		$nombre[5] = "Josmar";	$nombre[6] = "Luis";	$nombre[7] = "Wilmer";	$nombre[8] = "Jesus";	$nombre[9] = "Alberto";
		$nombre[10] = "Ana";	$nombre[11] = "Susana";	$nombre[12] = "Paola";	$nombre[13] = "Alexa";	$nombre[14] = "Gloria";
		$nombre[15] = "Teresa";	$nombre[16] = "Jimena";	$nombre[17] = "Lucia";	$nombre[18] = "Angela";	$nombre[19] = "Maria";

		$apellido[0] = "Colina";	$apellido[1] = "Perez";		$apellido[2] = "Veliz";		$apellido[3] = "Sanchez";
		$apellido[4] = "Hernandez";	$apellido[5] = "Romero";	$apellido[6] = "Morales";	$apellido[7] = "Gonzales";
		$apellido[8] = "Mora";		$apellido[9] = "Chirinos";

		for ($i=0; $i < $integer; $i++) { 
			$nm; $ap; $gn; $tf; $em; $bn; $pn; $vt;

			#Seleccion de nombre y genero
			switch (rand(0,1)) {
				case 0:	$nm = $nombre[rand(0,9)]; 	$gn = 'M'; break;
				case 1: $nm = $nombre[rand(10,19)];	$gn = 'F'; break;
			}
			#Seleccion de apellido
			$ap = $apellido[rand(0,9)]." ".$apellido[rand(0,9)];
			#Seleccion de pensionado (S/N)
			switch (rand(0,1)) {
				case 0:	$pn = 'S';	break;	case 1: $pn = 'N'; break;
			}
			#Seleccion de embarazo (S/N)
			if ($gn == 'F') {
				switch (rand(0,8)) {
					case 0:	$em = 'S';	break;
					default: $em = 'N'; break;
				}
			}else $em = 'N';
			#Seleccion de bono (S/N)
			switch (rand(0,1)) {
				case 0:	$bn = 'S';	break;	case 1: $bn = 'N'; break;
			}
			#Seleccion de voto (S/N)
			switch (rand(0,2)) {
				case 0:	$vt = 'D';	break;	case 1: $vt = 'B'; break;	case 2: $vt = 'O'; break;
			}
			#Generador de numero de telefono
			switch (rand(1,6)) {
				case 1: $tf = "0412-".rand(1000000,9999999);	break;
				case 2: $tf = "0268-".rand(1000000,9999999);	break;
				case 3: $tf = "0414-".rand(1000000,9999999);	break;
				case 4: $tf = "0424-".rand(1000000,9999999);	break;
				case 5: $tf = "0416-".rand(1000000,9999999);	break;
				case 6: $tf = "0426-".rand(1000000,9999999);	break;
			}
			$sql = "INSERT INTO PERSONA (NOMBRES, APELLIDOS, GENERO, DNI, TELEFONO, EMBARAZO, BONO, PENSIONADO, VOTO, FECHA_NAC, PESO, ESTATURA) VALUES ('$nm', '$ap', '$gn', ".rand(7000000,35000000).", '$tf', '$em', '$bn', '$pn', '$vt', '".rand(1940,2002)."-".rand(1,12)."-".rand(1,29)."', ".(rand(6000,12000)/100).", ".(rand(140,220)/100).")";
			$conn->query($sql);
		}
	}
	function bloques($filter = "ID", $binary = 0){
		$bloques;
		$conn = conexion();

		$sql = "SELECT * FROM BLOQUE ORDER BY $filter";

		switch ($binary) {
			case 0:
				$sql = $sql." ASC";
				break;
			case 1:
				$sql = $sql." DESC";
				break;
		}

		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$i = 0;
			while ($row = $result->fetch_assoc()) {
				$bloques[$i]['ID'] = $row['ID'];
				$bloques[$i]['NRO_BLOQUE'] = $row['NUMERO_BLOQUE'];
				$i++;
			}
		}
		$conn->close();
		return $bloques;
	}
	function bloque($id){
		$bloque;
		$conn = conexion();

		$sql = "SELECT * FROM BLOQUE WHERE ID = $id";

		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$bloque['ID'] = $row['ID'];
			$bloque['NRO_BLOQUE'] = $row['NUMERO_BLOQUE'];
		}
		$conn->close();
		return $bloque;
	}
	function apartamentos($filter = "ID", $binary = 0){
		$apartamentos;
		$conn = conexion();

		$sql = "SELECT APARTAMENTO.*, BLOQUE.NUMERO_BLOQUE AS NRO_BLOQUE FROM APARTAMENTO JOIN BLOQUE ON APARTAMENTO.ID_BLOQUE = BLOQUE.ID ORDER BY $filter";

		switch ($binary) {
			case 0:
				$sql = $sql." ASC";
				break;
			case 1:
				$sql = $sql." DESC";
				break;
		}

		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$i = 0;
			while ($row = $result->fetch_assoc()) {
				$apartamentos[$i]['ID'] = $row['ID'];
				$apartamentos[$i]['NRO_APARTAMENTO'] = $row['NUMERO_APARTAMENTO'];
				$apartamentos[$i]['ID_BLOQUE'] = $row['ID_BLOQUE'];
				$apartamentos[$i]['NRO_BLOQUE'] = $row['NRO_BLOQUE'];
				$i++;
			}
		}
		$conn->close();
		return $apartamentos;
	}
	function apartamento($id){
		$apartamento;
		$conn = conexion();

		$sql = "SELECT APARTAMENTO.*, BLOQUE.NUMERO_BLOQUE AS NRO_BLOQUE FROM APARTAMENTO JOIN BLOQUE ON APARTAMENTO.ID_BLOQUE = BLOQUE.ID WHERE APARTAMENTO.ID = $id";

		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$apartamento['ID'] = $row['ID'];
			$apartamento['NRO_APARTAMENTO'] = $row['NUMERO_APARTAMENTO'];
			$apartamento['ID_BLOQUE'] = $row['ID_BLOQUE'];
			$apartamento['NRO_BLOQUE'] = $row['NRO_BLOQUE'];
		}
		$conn->close();
		return $apartamento;
	}
	function apartamentosPorBloque($id_bloque){
		$apartamentos;
		$conn = conexion();

		$sql = "SELECT ID FROM APARTAMENTO WHERE ID_BLOQUE = $id_bloque";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$a = 0;
			while ($row = $result->fetch_assoc()) {
				$apartamentos[$a] = apartamento($a+1);
				$a++;
			}
		}
		return $apartamentos;
	}
	function familias($filter = "ID", $binary = 0){
		$familias;
		$conn = conexion();

		$sql = "SELECT FAMILIA.*, PERSONA.ID AS ID_JEFE, APARTAMENTO.NUMERO_APARTAMENTO AS NRO_APARTAMENTO, APARTAMENTO.ID_BLOQUE AS ID_BLOQUE, BLOQUE.NUMERO_BLOQUE AS NRO_BLOQUE FROM FAMILIA JOIN APARTAMENTO ON (FAMILIA.ID_APARTAMENTO = APARTAMENTO.ID) JOIN BLOQUE ON (APARTAMENTO.ID_BLOQUE = BLOQUE.ID) JOIN PERSONA ON (FAMILIA.ID = PERSONA.ID_FAMILIA AND PERSONA.JEFE_FAMILIA = 'S') ORDER BY $filter";

		switch ($binary) {
			case 0:
				$sql = $sql." ASC";
				break;
			case 1:
				$sql = $sql." DESC";
				break;
		}
		
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$i = 0;
			while ($row = $result->fetch_assoc()) {
				$familias[$i]['ID'] = $row['ID'];
				$familias[$i]['ID_JEFE'] = $row['ID_JEFE'];
				$familias[$i]['ID_APARTAMENTO'] = $row['ID_APARTAMENTO'];
				$familias[$i]['NRO_APARTAMENTO'] = $row['NRO_APARTAMENTO'];
				$familias[$i]['ID_BLOQUE'] = $row['ID_BLOQUE'];
				$familias[$i]['NRO_BLOQUE'] = $row['NRO_BLOQUE'];
				$i++;
			}
		}
		$conn->close();
		return $familias;
	}
	function familia($id){
		$familias;
		$conn = conexion();

		$sql = "SELECT FAMILIA.*, PERSONA.ID AS ID_JEFE, APARTAMENTO.NUMERO_APARTAMENTO AS NRO_APARTAMENTO, APARTAMENTO.ID_BLOQUE AS ID_BLOQUE, BLOQUE.NUMERO_BLOQUE AS NRO_BLOQUE FROM FAMILIA JOIN APARTAMENTO ON (FAMILIA.ID_APARTAMENTO = APARTAMENTO.ID) JOIN BLOQUE ON (APARTAMENTO.ID_BLOQUE = BLOQUE.ID) JOIN PERSONA ON (FAMILIA.ID = PERSONA.ID_FAMILIA AND PERSONA.JEFE_FAMILIA = 'S') WHERE FAMILIA.ID = $id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$familia['ID'] = $row['ID'];
			$familia['ID_JEFE'] = $row['ID_JEFE'];
			$familia['ID_APARTAMENTO'] = $row['ID_APARTAMENTO'];
			$familia['NRO_APARTAMENTO'] = $row['NRO_APARTAMENTO'];
			$familia['ID_BLOQUE'] = $row['ID_BLOQUE'];
			$familia['NRO_BLOQUE'] = $row['NRO_BLOQUE'];
		}
		$conn->close();
		return $familia;
	}
	function familiasPorApartamento($id_apartamento){
		$familias;
		$conn = conexion();

		$sql = "SELECT ID FROM FAMILIA WHERE ID_APARTAMENTO = $id_apartamento";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$a = 0;
			while ($row = $result->fetch_assoc()) {
				$familias[$a] = familia($a+1);
				$a++;
			}
		}
		return $familias;
	}
	function personas($filter = "ID", $binary = 0){
		$personas = NULL;
		$conn = conexion();

		$sql = "SELECT P1.*, P2.APELLIDOS AS FAMILIA,APARTAMENTO.ID AS ID_APARTAMENTO, APARTAMENTO.NUMERO_APARTAMENTO AS NRO_APARTAMENTO,BLOQUE.ID AS ID_BLOQUE, BLOQUE.NUMERO_BLOQUE AS NRO_BLOQUE FROM PERSONA AS P1 LEFT JOIN PERSONA AS P2 ON (P1.ID_FAMILIA = P2.ID_FAMILIA AND P2.JEFE_FAMILIA = 'S') LEFT JOIN FAMILIA ON (P1.ID_FAMILIA = FAMILIA.ID) LEFT JOIN APARTAMENTO ON (FAMILIA.ID_APARTAMENTO = APARTAMENTO.ID) LEFT JOIN BLOQUE ON (APARTAMENTO.ID_BLOQUE = BLOQUE.ID)";

		switch ($filter) {
			case 'ID': case 'NOMBRES': case 'APELLIDOS': case 'GENERO': case 'DNI': case 'TELEFONO': case 'EMBARAZO':
			case 'JEFE_FAMILIA': case 'LACTANTE': case 'BONO': case 'PENSIONADO': case 'VOTO': case 'FECHA_NAC': case 'PESO':
			case 'ESTATURA': case 'SERIAL_CARNET': case 'CODIGO_CARNET': case 'ID_FAMILIA':
			$sql = $sql." ORDER BY P1.$filter"; break;

			case 'FAMILIA': case 'ID_APARTAMENTO': case 'NRO_APARTAMENTO': case 'ID_BLOQUE': case 'NRO_BLOQUE':
			$sql = $sql." ORDER BY $filter"; break;

			default: $sql = $sql." ORDER BY P1.ID"; break;
		}
		switch ($binary) {
			case 0:
				$sql = $sql." ASC";
				break;
			case 1:
				$sql = $sql." DESC";
				break;
		}

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$i = 0;
			while($row = $result->fetch_assoc()) {
				$personas[$i]['ID'] = $row['ID'];
				$personas[$i]['NOMBRES'] = $row['NOMBRES'];
				$personas[$i]['APELLIDOS'] = $row['APELLIDOS'];
				$personas[$i]['GENERO'] = $row['GENERO'];
				$personas[$i]['DNI'] = $row['DNI'];
				$personas[$i]['TELEFONO'] = $row['TELEFONO'];
				$personas[$i]['EMBARAZO'] = $row['EMBARAZO'];
				$personas[$i]['JEFE_FAMILIA'] = $row['JEFE_FAMILIA'];
				$personas[$i]['LACTANTE'] = $row['LACTANTE'];
				$personas[$i]['BONO'] = $row['BONO'];
				$personas[$i]['PENSIONADO'] = $row['PENSIONADO'];
				$personas[$i]['VOTO'] = $row['VOTO'];
				$personas[$i]['FECHA_NAC'] = $row['FECHA_NAC'];
				$personas[$i]['PESO'] = $row['PESO'];
				$personas[$i]['ESTATURA'] = $row['ESTATURA'];
				$personas[$i]['SERIAL_CARNET'] = $row['SERIAL_CARNET'];
				$personas[$i]['CODIGO_CARNET'] = $row['CODIGO_CARNET'];
				$personas[$i]['ID_FAMILIA'] = $row['ID_FAMILIA'];
				$personas[$i]['FAMILIA'] = $row['FAMILIA'];
				$personas[$i]['ID_APARTAMENTO'] = $row['ID_APARTAMENTO'];
				$personas[$i]['NRO_APARTAMENTO'] = $row['NRO_APARTAMENTO'];
				$personas[$i]['ID_BLOQUE'] = $row['ID_BLOQUE'];
				$personas[$i]['NRO_BLOQUE'] = $row['NRO_BLOQUE'];
				$i++;
			}
		}
		$conn->close();
		return $personas;
	}
	function persona($id){
		$persona = NULL;
		$conn = conexion();

		$sql = "SELECT P1.*, P2.APELLIDOS AS FAMILIA,APARTAMENTO.ID AS ID_APARTAMENTO, APARTAMENTO.NUMERO_APARTAMENTO AS NRO_APARTAMENTO,BLOQUE.ID AS ID_BLOQUE, BLOQUE.NUMERO_BLOQUE AS NRO_BLOQUE FROM PERSONA AS P1 LEFT JOIN PERSONA AS P2 ON (P1.ID_FAMILIA = P2.ID_FAMILIA AND P2.JEFE_FAMILIA = 'S') LEFT JOIN FAMILIA ON (P1.ID_FAMILIA = FAMILIA.ID) LEFT JOIN APARTAMENTO ON (FAMILIA.ID_APARTAMENTO = APARTAMENTO.ID) LEFT JOIN BLOQUE ON (APARTAMENTO.ID_BLOQUE = BLOQUE.ID) WHERE P1.ID = $id";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$persona['ID'] = $row['ID'];
			$persona['NOMBRES'] = $row['NOMBRES'];
			$persona['APELLIDOS'] = $row['APELLIDOS'];
			$persona['GENERO'] = $row['GENERO'];
			$persona['DNI'] = $row['DNI'];
			$persona['TELEFONO'] = $row['TELEFONO'];
			$persona['EMBARAZO'] = $row['EMBARAZO'];
			$persona['JEFE_FAMILIA'] = $row['JEFE_FAMILIA'];
			$persona['LACTANTE'] = $row['LACTANTE'];
			$persona['BONO'] = $row['BONO'];
			$persona['PENSIONADO'] = $row['PENSIONADO'];
			$persona['VOTO'] = $row['VOTO'];
			$persona['FECHA_NAC'] = $row['FECHA_NAC'];
			$persona['PESO'] = $row['PESO'];
			$persona['ESTATURA'] = $row['ESTATURA'];
			$persona['SERIAL_CARNET'] = $row['SERIAL_CARNET'];
			$persona['CODIGO_CARNET'] = $row['CODIGO_CARNET'];
			$persona['ID_FAMILIA'] = $row['ID_FAMILIA'];
			$persona['FAMILIA'] = $row['FAMILIA'];
			$persona['ID_APARTAMENTO'] = $row['ID_APARTAMENTO'];
			$persona['NRO_APARTAMENTO'] = $row['NRO_APARTAMENTO'];
			$persona['ID_BLOQUE'] = $row['ID_BLOQUE'];
			$persona['NRO_BLOQUE'] = $row['NRO_BLOQUE'];
		}
		$conn->close();
		return $persona;
	}
	function personasPorFamilia($id_familia){
		$personas;
		$conn = conexion();

		$sql = "SELECT ID FROM PERSONA WHERE ID_FAMILIA = $id_familia";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$a = 0;
			while ($row = $result->fetch_assoc()) {
				$personas[$a] = persona($a+1);
				$a++;
			}
		}
		return $personas;
	}
	function recibenBonos($boolean){
		$personas = NULL;
		$conn = conexion();

		$aux;
		if 		($boolean==true)	$aux = "'S'";	
		else if	($boolean==false)	$aux = "'N'";

		$sql = "SELECT ID, NOMBRES, APELLIDOS FROM PERSONA WHERE BONO = $aux";
		
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$a = 0;
			while($row = $result->fetch_assoc()) {
				$personas[$a]['ID'] = $row["ID"];
				$personas[$a]['NOMBRES'] = $row["NOMBRES"];
				$personas[$a]['APELLIDOS'] = $row["APELLIDOS"];
				$a++;
			}
		}
		$conn->close();
		return $personas;
	}
	function pensionados($filter = 'AM'){
		$personas = NULL;
		$conn = conexion();

		$aux;
		switch ($filter) {
			case 'ALL':
				$aux = "AM AND PENSIONADO = SS";
				break;
			case 'NT':
			case 'AM':
			case 'SS':
				break;
			default:
				$aux = "AM";
				break;
		}

		$sql = "SELECT ID, NOMBRES, APELLIDOS FROM PERSONA WHERE PENSIONADO = $aux";
		
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$a = 0;
			while($row = $result->fetch_assoc()) {
				$personas[$a]['ID'] = $row["ID"];
				$personas[$a]['NOMBRES'] = $row["NOMBRES"];
				$personas[$a]['APELLIDOS'] = $row["APELLIDOS"];
				$a++;
			}
		}
		$conn->close();
		return $personas;
	}
	function embarazadas($boolean){
		$personas = NULL;
		$conn = conexion();

		$aux;
		if 		($boolean==true)	$aux = "'S'";	
		else if ($boolean==false)	$aux = "'N'";
		else	return NULL;
		$sql = "SELECT ID, NOMBRES, APELLIDOS FROM PERSONA WHERE (EMBARAZO = $aux AND GENERO = 'F')";
		
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$a = 0;
			while($row = $result->fetch_assoc()) {
				$personas[$a]['ID'] = $row["ID"];
				$personas[$a]['NOMBRES'] = $row["NOMBRES"];
				$personas[$a]['APELLIDOS'] = $row["APELLIDOS"];
				$a++;
			}
		}
		$conn->close();
		return $personas;
	}
	function tienenCarnet($boolean){
		$personas = NULL;
		$conn = conexion();


		$aux;
		if 		($boolean == true)
			$sql = "SELECT ID, NOMBRES, APELLIDOS, SERIAL_CARNET, CODIGO_CARNET FROM PERSONA WHERE (SERIAL_CARNET IS NOT NULL AND CODIGO_CARNET IS NOT NULL)";	
		else if ($boolean == false)	
			$sql = "SELECT ID, NOMBRES, APELLIDOS FROM PERSONA WHERE (SERIAL_CARNET IS NULL AND CODIGO_CARNET IS NULL)";
		
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$a = 0;
			while($row = $result->fetch_assoc()) {
				$personas[$a]['ID'] = $row["ID"];
				$personas[$a]['NOMBRES'] = $row["NOMBRES"];
				$personas[$a]['APELLIDOS'] = $row["APELLIDOS"];
				if ($boolean == true) {
					$personas[$a]['SERIAL_CARNET'] = $row["SERIAL_CARNET"];
					$personas[$a]['CODIGO_CARNET'] = $row["CODIGO_CARNETS"];
				}
				$a++;
			}
		}
		$conn->close();
		return $personas;
	}
	function bombonas($filter = "ID", $binary = 0){
		$bombonas;
		$conn = conexion();

		$sql = "SELECT BOMBONA.*, TIPOBOMBONA.TIPO AS TIPO, MARCABOMBONA.MARCA AS MARCA, PERSONA.NOMBRES AS NOMBRES, PERSONA.APELLIDOS AS APELLIDOS FROM BOMBONA JOIN TIPOBOMBONA ON (BOMBONA.ID_TIPO = TIPOBOMBONA.ID) JOIN MARCABOMBONA ON (BOMBONA.ID_MARCA = MARCABOMBONA.ID) JOIN PERSONA ON (BOMBONA.ID_FAMILIA = PERSONA.ID_FAMILIA AND PERSONA.JEFE_FAMILIA = 'S') ORDER BY $filter";

		switch ($binary) {
			case 0:
				$sql = $sql." ASC";
				break;
			
			case 1:
				$sql = $sql." DESC";
				break;
		}

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$a = 0;
			while ($row = $result->fetch_assoc()) {
				$bombonas[$a]['ID'] = $row['ID'];
				$bombonas[$a]['ID_FAMILIA'] = $row['ID_FAMILIA'];
				$bombonas[$a]['ID_MARCA'] = $row['ID_MARCA'];
				$bombonas[$a]['ID_TIPO'] = $row['ID_TIPO'];
				$bombonas[$a]['NOMBRE_JEFE'] = $row['NOMBRES']." ".$row['APELLIDOS'];
				$a++;
			}
		}
		$conn->close();
		return $bombonas;
	}
	function bombona($id){
		$bombona;
		$conn = conexion();

		$sql = "SELECT BOMBONA.*, TIPOBOMBONA.TIPO AS TIPO, MARCABOMBONA.MARCA AS MARCA, PERSONA.NOMBRES AS NOMBRES, PERSONA.APELLIDOS AS APELLIDOS FROM BOMBONA JOIN TIPOBOMBONA ON (BOMBONA.ID_TIPO = TIPOBOMBONA.ID) JOIN MARCABOMBONA ON (BOMBONA.ID_MARCA = MARCABOMBONA.ID) JOIN PERSONA ON (BOMBONA.ID_FAMILIA = PERSONA.ID_FAMILIA AND PERSONA.JEFE_FAMILIA = 'S') WHERE BOMBONA.ID = $id";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$bombona['ID'] = $row['ID'];
			$bombona['ID_FAMILIA'] = $row['ID_FAMILIA'];
			$bombona['ID_MARCA'] = $row['ID_MARCA'];
			$bombona['ID_TIPO'] = $row['ID_TIPO'];
			$bombona['NOMBRE_JEFE'] = $row['NOMBRES']." ".$row['APELLIDOS'];
			}
		$conn->close();
		return $bombona;
	}
	function bombonasPorFamilia($id_familia){
		$bombonas;
		$conn = conexion();

		$sql = "SELECT ID FROM BOMBONA WHERE ID_FAMILIA = $id_familia";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$a = 0;
			while ($row = $result->fetch_assoc()) {
				$bombonas[$a] = bombona($a);
				$a++;
			}
		}
		return $bombonas;
	}
	function estadoDeNutricion($integer){
		$tabla;
		$conn = conexion();
		$limit;

		switch ($integer) {
			case 1:
				$limit = "(P1.PESO)/(P1.ESTATURA * P1.ESTATURA) < 18.50";
				break;
			case 2:
				$limit = "(P1.PESO)/(P1.ESTATURA * P1.ESTATURA) < 25.00 AND (P1.PESO)/(P1.ESTATURA * P1.ESTATURA) > 18.49";
				break;
			case 3:
				$limit = "(P1.PESO)/(P1.ESTATURA * P1.ESTATURA) < 30.00 AND (P1.PESO)/(P1.ESTATURA * P1.ESTATURA) > 24.99";
				break;
			case 4:
				$limit = "(P1.PESO)/(P1.ESTATURA * P1.ESTATURA) > 30.00";
				break;
			default:
				$limit = "(P1.PESO)/(P1.ESTATURA * P1.ESTATURA) < 18.50";
				break;
		}

		$sql = "SELECT P1.*, (P1.PESO)/(P1.ESTATURA * P1.ESTATURA) AS IMC, P2.APELLIDOS AS FAMILIA,APARTAMENTO.ID AS ID_APARTAMENTO, APARTAMENTO.NUMERO_APARTAMENTO AS NRO_APARTAMENTO,BLOQUE.ID AS ID_BLOQUE, BLOQUE.NUMERO_BLOQUE AS NRO_BLOQUE FROM PERSONA AS P1 LEFT JOIN PERSONA AS P2 ON (P1.ID_FAMILIA = P2.ID_FAMILIA AND P2.JEFE_FAMILIA = 'S') LEFT JOIN FAMILIA ON (P1.ID_FAMILIA = FAMILIA.ID) LEFT JOIN APARTAMENTO ON (FAMILIA.ID_APARTAMENTO = APARTAMENTO.ID) LEFT JOIN BLOQUE ON (APARTAMENTO.ID_BLOQUE = BLOQUE.ID) WHERE ($limit)";

		$result = $conn->query($sql);
		echo $conn->error;
		if ($result->num_rows > 0) {
			$a = 0;
			while ($row = $result->fetch_assoc()) {
				$tabla[$a]['ID'] = $row['ID'];
				$tabla[$a]['NOMBRES'] = $row['NOMBRES'];
				$tabla[$a]['APELLIDOS'] = $row['APELLIDOS'];
				$tabla[$a]['GENERO'] = $row['GENERO'];
				$tabla[$a]['DNI'] = $row['DNI'];
				$tabla[$a]['TELEFONO'] = $row['TELEFONO'];
				$tabla[$a]['PESO'] = $row['PESO'];
				$tabla[$a]['ESTATURA'] = $row['ESTATURA'];
				$tabla[$a]['ID_FAMILIA'] = $row['ID_FAMILIA'];
				$tabla[$a]['FAMILIA'] = $row['FAMILIA'];
				$tabla[$a]['ID_APARTAMENTO'] = $row['ID_APARTAMENTO'];
				$tabla[$a]['NRO_APARTAMENTO'] = $row['NRO_APARTAMENTO'];
				$tabla[$a]['ID_BLOQUE'] = $row['ID_BLOQUE'];
				$tabla[$a]['NRO_BLOQUE'] = $row['NRO_BLOQUE'];
				$tabla[$a]['IMC'] = intval($row['IMC']*100)/100;
				$a++;
			}
		}
		return $tabla;
	}
	function lactantes(){
		$tabla;
		$personas = personas();
		$hoy = new DateTime();
		for ($i=0, $a=0; $i < count($personas); $i++) {

			if ($personas[$i]['FECHA_NAC'] == NULL)
				continue;

			$aux = new DateTime($personas[$i]['FECHA_NAC']);
			
			if ($hoy->diff($aux)->y == 0) {
				$tabla[$a]['ID'] = $personas[$i]['ID'];
				$tabla[$a]['NOMBRES'] = $personas[$i]['NOMBRES'];
				$tabla[$a]['APELLIDOS'] = $personas[$i]['APELLIDOS'];
				$tabla[$a]['GENERO'] = $personas[$i]['GENERO'];
				$tabla[$a]['FECHA_NAC'] = $personas[$i]['FECHA_NAC'];
				$tabla[$a]['ID_FAMILIA'] = $personas[$i]['ID_FAMILIA'];
				$tabla[$a]['FAMILIA'] = $personas[$i]['FAMILIA'];
				$tabla[$a]['ID_APARTAMENTO'] = $personas[$i]['ID_APARTAMENTO'];
				$tabla[$a]['NRO_APARTAMENTO'] = $personas[$i]['NRO_APARTAMENTO'];
				$tabla[$a]['ID_BLOQUE'] = $personas[$i]['ID_BLOQUE'];
				$tabla[$a]['NRO_BLOQUE'] = $personas[$i]['NRO_BLOQUE'];
				$a++;
			}
		}
		return $tabla;
	}

	function agregarPersona($nombres, $apellidos, $genero, $dni, $telefono, $embarazo, $jefefamilia, $lactante, $bono, $pensionado, $grado_inst, $cargo_lab, $voto, $fechanac, $peso, $estatura, $serialcarnet, $codigocarnet, $id_familia){

		$conn = conexion();
		
		$sql = "INSERT INTO PERSONA (NOMBRES, APELLIDOS, GENERO, DNI, TELEFONO, EMBARAZO, JEFE_FAMILIA, LACTANTE, BONO, PENSIONADO, GRADO_INSTRUCCION, CARGO_LABORAL, VOTO, FECHA_NAC, PESO, ESTATURA, SERIAL_CARNET, CODIGO_CARNET, ID_FAMILIA) VALUES ($nombres, $apellidos, $genero, $dni, $telefono, $embarazo, $jefefamilia, $lactante, $bono, $pensionado, $grado_inst, $cargo_lab, $voto, $fechanac, $peso, $estatura, $serialcarnet, $codigocarnet, $id_familia)";

		$result = $conn->query($sql);
		if ($result === TRUE) {
			$conn->close();
			return TRUE;
		} else {
			$conn->close();
			return FALSE;
		}
	}
	function agregarProgramaSocial($nombre){
		$conn = conexion();
		
		$sql = "INSERT INTO PROGRAMASOCIAL (NOMBRE) VALUES ('$nombre')";
		$result = $conn->query($sql);

		if ($result === TRUE) {
			$conn->close();
			return TRUE;
		} else {
			$conn->close();
			return FALSE;
		}
	}
	function atribuirProgramaSocial($id_programa, $id_persona){
		$conn = conexion();
		
		$sql = "INSERT INTO REL_PERSONAPROGRAMA (ID_PROGRAMA, ID_PERSONA) VALUES ($id_programa, $id_persona)";
		$result = $conn->query($sql);

		if ($result === TRUE) {
			$conn->close();
			return TRUE;
		} else {
			$conn->close();
			return FALSE;
		}
	}
	function agregarTipoDiscapacidad($tipo){
		$conn = conexion();
		
		$sql = "INSERT INTO TIPODISCAPACIDAD (TIPO) VALUES ('$tipo')";
		$result = $conn->query($sql);

		if ($result === TRUE) {
			$conn->close();
			return TRUE;
		} else {
			$conn->close();
			return FALSE;
		}
	}
	function atribuirDiscapacidad($id_tipo, $id_persona){
		$conn = conexion();
		
		$sql = "INSERT INTO DISCAPACIDAD (ID_TIPO, ID_PERSONA) VALUES ($id_tipo, $id_persona)";
		$result = $conn->query($sql);

		if ($result === TRUE) {
			$conn->close();
			return TRUE;
		} else {
			$conn->close();
			return FALSE;
		}
	}
	function agregarBombona($id_familia, $id_tipo, $id_marca){
		$conn = conexion();
		
		$sql = "INSERT INTO BOMBONA (ID_FAMILIA, ID_TIPO, ID_MARCA) VALUES ($id_familia, $id_tipo, $id_marca)";
		$result = $conn->query($sql);

		if ($result === TRUE) {
			$conn->close();
			return TRUE;
		} else {
			$conn->close();
			return FALSE;
		}
	}
	function agregarFamilia($id_apartamento){
		$conn = conexion();
		
		$sql = "INSERT INTO FAMILIA (ID_APARTAMENTO) VALUES ($id_apartamento)";
		$result = $conn->query($sql);

		if ($result === TRUE) {
			$conn->close();
			return TRUE;
		} else {
			$conn->close();
			return FALSE;
		}
	}
	function agregarAnexo($nro_apartamento, $id_bloque){
		$conn = conexion();
		
		$sql = "INSERT INTO APARTAMENTO (NUMERO_APARTAMENTO, ANEXO, ID_BLOQUE) VALUES ($nro_apartamento, 'S', $id_bloque)";
		$result = $conn->query($sql);

		if ($result === TRUE) {
			$conn->close();
			return TRUE;
		} else {
			$conn->close();
			return FALSE;
		}
	}
	function registrarEntregaBeneficio($fecha_entrega, $id_familia){
		$conn = conexion();
		
		$sql = "INSERT INTO BENEFICIO (FECHA_ENTREGA, $ID_FAMILIA) VALUES ('$fecha_entrega', $id_familia)";
		$result = $conn->query($sql);

		if ($result === TRUE) {
			$conn->close();
			return TRUE;
		} else {
			$conn->close();
			return FALSE;
		}
	}
	function personasEnFamilia($id){
		$conn = conexion();

		$sql = "SELECT ID FROM PERSONA WHERE ID_FAMILIA = $id";
		$result = $conn->query($sql);
		$conn->close();
		return $result->num_rows;
	}
	function familiasEnApartamento($id){
		$conn = conexion();

		$sql = "SELECT ID FROM FAMILIA WHERE ID_APARTAMENTO = $id";
		$result = $conn->query($sql);
		$conn->close();
		return $result->num_rows;
	}
	function apartamentosConUnaPersona(){
		$apartamentos;
		$conn = conexion();

		$sql = "SELECT FAMILIA.*, PERSONA.ID AS ID_PERSONA, PERSONA.NOMBRES AS NOMBRES, PERSONA.APELLIDOS AS APELLIDOS FROM FAMILIA JOIN PERSONA ON (FAMILIA.ID = PERSONA.ID_FAMILIA)";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$a = 0;
			while ($row = $result->fetch_assoc()) {
				if (personasEnFamilia($row['ID']) == 1) {
					if (familiasEnApartamento($row['ID_APARTAMENTO']) == 1) {
						$apartamentos[$a]['ID_APARTAMENTO'] = $row['ID_APARTAMENTO'];
						$apartamentos[$a]['ID_PERSONA'] = $row['ID_PERSONA'];
						$apartamentos[$a]['NOMBRE_COMPLETO'] = $row['NOMBRES']." ".$row['APELLIDOS'];
						$a++;
					}
				}
			}
		}
		$conn->close();
		return $apartamentos;
	}
	#llenarPersonasRandom(150);
	#$a = lactantes();
	
	#var_dump($a);
	/*
	for ($i=0; $i < count($a); $i++) {
		var_dump($a[$i]);
		echo "<br><br>";
	}
	/*
	*/
	/*
	$fecha_nacimiento = new DateTime("2020-5-18");
	$hoy = new DateTime();
	$edad = $hoy->diff($fecha_nacimiento);

	echo $edad->y;
	*/

?>