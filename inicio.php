<?php

require 'conexion.php';
$conexion = new mysqli($serverName, $userName, $password, $dbName);
$consulta = "SELECT * FROM productos";
$resultado = $conexion->query($consulta);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SEGVE</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation&family=Roboto+Condensed&display=swap" rel="stylesheet">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">
<link href="diseño.css" rel="stylesheet">

  </head>
  <body >

<header> 
    <nav class="navbar" style="background-color: #2f9d94;">
      <div class="container-fluid">
        <h5 class="navbar-brand fst-italic  fs-4" href="#" >
          <img src="./img/logo.jpeg" alt="" width="180px" height="62px" class="d-inline-block align-text-top">
          
        </h5>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>


        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background-color: #b2cccd;">
          <div style="background-color: #2f9d94;" class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color: #fff;" >Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" id="espacio" aria-current="page" href="inicio.php" style="background-color: #fff;" >Inicio</a>
              </li>
              <br>


              <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="administrador.php" id="espacio" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #fff;">Administrador</a>
            <ul class="dropdown-menu" aria-labelledby="espacio">
              <li><a class="dropdown-item" href="administrador.php">Agregar</a></li>
              <li><a class="dropdown-item" href="index.php">Inventario</a></li>
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

</header> 


<main> 
<div class="container px-4 py-5" id="custom-cards">
    <h2 class="pb-2 border-bottom">Productos</h2>
<div class="row row-cols-1 row-cols-lg-4 align-items-stretch g-4 py-2">

<?PHP
    //Ciclo para recorrer el objeto y sus datos
  while($row = $resultado->fetch_assoc())
  {
    $datos = "productos".$row['id']."\n".$row['nombre']."\n".$row['marca']."\n".$row['categoria']."\n".$row['descripcion']."\n".$row['imagen'];
    $contenido = $datos;
    
      ?>
  <div class="col">
    <div class="card card-cover h-100 overflow-hidden text-black bg-light rounded-5 shadow-lg" style="background-image: url('unsplash-photo-1.jpg');">
      <div class="d-flex flex-column h-100 p-4 pb-4 text-black text-shadow-1">
      <img width="100%" height="200" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>">
        <h4 class="pt-1 mt-3 mb-3 lh-1 fw-bold"><?PHP echo $row['nombre']; ?></h4>
        <ul class="d-flex list-unstyled mt-auto">
          <li class="me-auto">
           
            <h4 class="pt-1 mt-3 mb-3 lh-1 fw-bold">$ <?PHP echo $row['precio']; ?></h4>
          </li>
          <li class="d-flex align-items-center me-3">
            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"/></svg>
            <small><?PHP echo $row['marca']; ?></small>
          </li>
          <li class="d-flex align-items-center">
            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
            <small><?PHP echo $row['categoria']; ?></small>
          </li>
        </ul>

        <li class="d-flex align-items-center me-3">
        <button  class="w3-btn w3-ripple w3-red"><img  width="20" height="20" src="eliminar.png"></button>
        <button class="w3-btn w3-ripple w3-blue"><img  width="20" height="20" src="actualizar.png"></button>
        </li>
        

      </div>
    </div>
  </div>

  <?PHP } ?>

</div>
</div>




</main> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>