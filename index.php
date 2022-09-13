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

    <!--<div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    

        <div class="col">
          <div class="card shadow-sm">
          <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>">

          <div class="card-body">
            <h4 class="card-title"> <?PHP echo $row['nombre']; ?></h4>
              <h5 class="card-text"> <?PHP echo $row['marca']; ?></h5>
              <p class="card-text"> <?PHP echo $row['descripcion']; ?></p>
              <div class="btn-group">
                <a href="" id="boton2" class="btn btn-primary">Informacion</a>
              </div>
              <a href="" id="boton1" class="btn btn-success" >Votar</a>
         </div>
                
        </div>
              
    </div>
    </div>-->

    <div class="b-example-divider"></div>
  
  <div class="container px-4 py-5" id="custom-cards">
  <h2 class="pb-2 border-bottom">Inventario</h2>
  <table class="table table-dark table-striped table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nombre </th>
		      <th scope="col">Marca</th>
           <th scope="col">Categoria</th>
           <th scope="col">Precio</th>
		     
          <th scope="col">Existencia</th>

          <th scope="col">Editar</th>
			  <th scope="col">Borrado </th>

		    </tr>
		  </thead>
		  <tbody>
		  	<?PHP
		  	//Ciclo para recorrer el objeto y sus datos
        while($row = $resultado->fetch_assoc())
        {
          $datos = "productos".$row['id']."\n".$row['nombre']."\n".$row['marca']."\n".$row['categoria']."\n".$row['descripcion']."\n".$row['imagen']."\n".$row['existencia']."\n".$row['precio'];
          $contenido = $datos;
				
			  	?>
			    <tr>
			      <th scope="row">
			      	<?PHP echo $row['id']; ?>
			      </th>
			      <td>
			      	<?PHP echo $row['nombre']; ?>

			      </td>
			      <td>
			      	<?PHP echo $row['marca']; ?>
			      </td>
            
            <td>
			      	<?PHP echo $row['categoria']; ?>
			      </td>


            <td>
			      	<?PHP echo $row['precio']; ?>
			      </td>

            <td>
			      	<?PHP echo $row['existencia']; ?>
			      </td>

            
			      <td>
			      	<a href="editar.php?id=<?php echo $row['id'];?>">
			      		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
						<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
						<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
						</svg>
			      	</a>
			      </td>

            <td>
			      	<a href="borrarLogicoPelicula.php?id=<?php echo $row['id'];?>">
			      		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
						<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
						<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
						</svg>
			      	</a>
			      </td>
			     
			    </tr>
			    <?PHP
			}
			?>
		  </tbody>
		</table>
  </div>

  

  



</main> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>