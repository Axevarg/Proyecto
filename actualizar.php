<?php
	
	$id = $_POST['id'];
	$nombre = $_POST["nombreCandi"];
$marca = $_POST["marca"];
$categoria = $_POST["categoria"];
$descripcion = $_POST["descripcion"];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$existencia= $_POST["existencia"];
$precio= $_POST["precio"];

	//Servidor, usuario, contraseña, BD
include('conexion.php');
$conexion = new mysqli($serverName, $userName, $password, $dbName);

	$consulta = "UPDATE pelicula SET 
				 nombre = '$nombre',
				 marca = '$marca',
				 categoria = '$categoria',
				 descripcion = '$descripcion',
				 imagen = '$imagen',
				 existencia = '$existencia',
				 precio = '$precio'
				 WHERE id = $id
				";
	//echo "Consulta: <br> " . $consulta;

	$conexion->query($consulta);

	echo "Datos actualizados";
	echo "<a href='peliculas.php'>Volver</a>"

?>