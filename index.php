<?php

require 'conexion.php';
$conexion = new mysqli($serverName, $userName, $password, $dbName);
$consulta = "SELECT * FROM candidatos";
$resultado = $conexion->query($consulta);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation&family=Roboto+Condensed&display=swap" rel="stylesheet">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">
<link href="./css/diseño.css" rel="stylesheet">

  </head>
  <body >


    <nav class="navbar" style="background-color: #ECA5E8;">
      <div class="container-fluid">
        <h5 class="navbar-brand fst-italic  fs-4" href="#" >
          <img src="./img/BVT.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
          Votaciones Electronicas
        </h5>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>


        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background-color: #D1C9AB;">
          <div style="background-color: #fff;" class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" id="espacio" aria-current="page" href="#" style="background-color: #fff;" >Inicio</a>
              </li>
              <br>


              <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="administrador.php" id="espacio" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #fff;">Administrador</a>
            <ul class="dropdown-menu" aria-labelledby="espacio">
              <li><a class="dropdown-item" href="administrador.php">Agregar</a></li>
              <li><a class="dropdown-item" href="#">Modificar</a></li>
              <li><a class="dropdown-item" href="#">Eliminar</a></li>
            </ul>
          </li>


              <br>
              <li class="nav-item">
                <a class="nav-link active" id="espacio" href="#"  style="background-color: #fff;">Sobre nosotros...</a>
              </li>
            </ul>
            
          </div>
        </div>


      </div>
    </nav>


    <?PHP
		  	//Ciclo para recorrer el objeto y sus datos
			while($row = $resultado->fetch_assoc())
			{
				$datos = "candidatos".$row['id']."\n".$row['nombre']."\n".$row['partido']."\n".$row['estado']."\n".$row['descripcion']."\n".$row['imagen'];
				$contenido = $datos;
				
			  	?>


  <div class="album py-5" >
    <div class="container " >
    <div class="col-lg-4">
      <div class="col">
        <div class="card shadow-sm" id="cuadro">
         <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>">

          <div class="card-body">
            <h4 class="card-title"> <?PHP echo $row['nombre']; ?></h4>
            <h5 class="card-text"> <?PHP echo $row['partido']; ?></h5>
            <p class="card-text"> <?PHP echo $row['estado']; ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="" id="boton2" class="btn btn-primary">Informacion</a>
              
              </div>
              <a href="" id="boton1" class="btn btn-success" >Votar</a>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?PHP
			}
			?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>