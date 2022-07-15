<?PHP
$nombre = $_POST["nombreCandi"];
$partido = $_POST["partido"];
$estado = $_POST["estado"];
$descripcion = $_POST["descripcion"];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));


include('conexion.php');
$conexion = new mysqli($serverName, $userName, $password, $dbName);

$consulta = "INSERT INTO candidatos (id, nombre, partido, estado, descripcion, imagen) 
	VALUES (null,'$nombre', '$partido', '$estado', '$descripcion', '$imagen')";
$ejecutar = mysqli_query($conexion, $consulta);

echo "Registro correcto <br>";
?>