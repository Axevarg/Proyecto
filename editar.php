<?php

require 'conexion.php';
$conexion = new mysqli($serverName, $userName, $password, $dbName);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

<script src="main.js" ></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

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
    <br>

    <div class="card shadow-sm" id="cuadro">
       

    <div class="container centrado" id="agregar">
		<h2 class="letraBlanca">Editar Producto</h2>


        <?php
			$id = $_GET['id'];

			$conexion = new mysqli("localhost","root","","peliculas");
			$consulta = "Select * from productos where id=".$id;

			$resultado = $conexion->query($consulta);
		?>
		<?php 
			while($row = $resultado->fetch_assoc())
            {		
		?>

		<form action="actualizar.php" method="POST" enctype="multipart/form-data">
			<div class="row">

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-8">
					<input class="form-control" name="nombreCandi" type="text" placeholder="Nombre del producto" value="<?php echo $row['nombre'];?>" required />
				</div>

        <div class="col-lg-4">
					<input class="form-control" name="precio" type="number" placeholder="Precio" value="<?php echo $row['precio'];?>" required />
				</div>

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-4">
					<input class="form-control" type="text" name="marca" placeholder="Marca" required />
				</div>

        <div class="col-lg-4">
					<input class="form-control" type="number" name="existencia" placeholder="Existencia" required />
				</div>

				<div class="col-lg-4">

          <?php 
            $conexion = new mysqli("localhost","root","","sigve");
            $query=mysqli_query($conexion,"SELECT id, categoria FROM categoria");
           ?>
        <select class="form-control" name="categoria">
        <?php    
		 while($categoria = mysqli_fetch_array($query)){
		     ?>
		    <option name="categoria" value="<?php  echo $categoria['categoria']?>" required><?php  echo $categoria['categoria']?></option>
        

        <?php
		   }
		   
		 ?>

	     </select>

				</div>
				

				<div class="col-lg-12">
					<br>
				</div>

                <div class="col-lg-4">
					<textarea class="form-control" name="descripcion" placeholder="Descripcion" rows="4" required /></textarea>
				</div>

				<div class="col-lg-4">
					
                    <input type="file"  name="imagen" id="imagenCandi" class="form-control" REQUIRED />

                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script>
                        $("#imagenCandi").on("change", function(){
                            var imagen =$(this)[0].files[0];
                            var fileReader =new FileReader();
                            fileReader.readAsDataURL(imagen);
                            fileReader.onload = function(){
                                $("#cargar").append("<img src='"+ fileReader.result +"'>");
                            }

                        });

                    </script>

				</div>

				<div class="col-lg-4">
                    <div class="card shadow-sm" id="cuadro">
                        <div id="cargar"></div>
                    </div>
                    <br>
				</div>

                

				<div class="col-lg-10">
				</div>

				<div class="col-lg-2">
					<input type="submit" class="btn btn-primary" value="Guardar">
				</div>


			</div>


		</form>
	</div>
	<?php }?>
</div>


<br>


<br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>