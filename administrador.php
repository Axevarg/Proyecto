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
<link href="./css/diseño.css" rel="stylesheet">

  </head>
  <body >


    <nav class="navbar" style="background-color: #ECA5E8;">
      <div class="container-fluid">
        <h5 class="navbar-brand fst-italic  fs-4" href="#" >
          <img src="./img/BVT.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
          Administrador
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
                <a class="nav-link active" id="espacio" aria-current="page" href="index.php" style="background-color: #fff;" >Inicio</a>
              </li>
              <br>
              <li class="nav-item">
                <a class="nav-link active" id="espacio" href="#"  style="background-color: #fff;">Administrador</a>
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
		<h2 class="letraBlanca">Agregar Candidato</h2>

		<form action="candidatos.php" method="POST" enctype="multipart/form-data">
			<div class="row">

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-12">
					<input class="form-control" name="nombreCandi" type="text" placeholder="Nombre del candidato" required />
				</div>

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-6">
					<input class="form-control" type="text" name="partido" placeholder="Partido" required />
				</div>
				<div class="col-lg-6">
					<input class="form-control" type="text" name="estado" placeholder="Estado" required />
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

</div>


<br>

<div class="card shadow-sm" id="cuadro">
       

    <div class="container centrado" id="agregar">
		<h2 class="letraBlanca">Agregar votante</h2>

		<form action="" method="POST">
			<div class="row">

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-12">
					<input class="form-control" name="nombrePelicula" type="text" placeholder="Curp" required />
				</div>

				<div class="col-lg-12">
					<br>
				</div>
				
				<div class="col-lg-2">
					<input type="submit" class="btn btn-primary" value="Guardar">
				</div>

            

			</div>


		</form>
	</div>

</div>
<br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>