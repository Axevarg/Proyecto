<?PHP
$id = $_POST['id'];
$nombre = $_POST["nombreCandi"];
$marca = $_POST["marca"];
$categoria = $_POST["categoria"];
$descripcion = $_POST["descripcion"];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$existencia= $_POST["existencia"];
$precio= $_POST["precio"];

include('conexion.php');
$conexion = new mysqli($serverName, $userName, $password, $dbName);

$consulta = "INSERT INTO productos (id, nombre, marca, categoria, descripcion, imagen, existencia, precio) 
	VALUES (null,'$nombre', '$marca', '$categoria', '$descripcion', '$imagen', '$existencia', '$precio')";
$ejecutar = mysqli_query($conexion, $consulta);

echo "Registro correcto <br>";
?>