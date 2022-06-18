<?php
  //Iniciamos la sesion segun el perfil del usuario
  session_start();

  //Valida el usuario y su rol que tiene de ser diferente redirecciona a la pagina segun su rol
  if (!isset($_SESSION['usuario']) && !isset($_SESSION['tipousuario'])) {
  	header('location: ../../login/login.php');
  } else {
  	if ($_SESSION['tipousuario'] != 'Usuario') {
      header("location: ../../login/login.php");
    }
  }

  // Conexion a la base de datos
	$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	// Creamos una consulta
	$cons = "SELECT Marca FROM proveedores";

	//Ejecutamos la consulta
	$exec = mysqli_query($conn, $cons);

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<!-- Enlace a libreria CSS de Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- Enlace a la libreria de iconos de Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<title> Pagina principal usuarios </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<!-- Contenedor -->
			<div class="container-fluid">
				<!-- Boton que aparecera para pantallas adaptadas -->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<!-- Icono del boton que aparecera para pantallas adaptadas -->
					<span class="navbar-toggler-icon"></span>
				</button>
				<!-- Contenedor que obtendra la barra de navegacion -->
				<div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<img src="https://img.icons8.com/color/48/000000/traffic-jam.png" alt="Logo" width="30">
					</ul>
					<!-- Boton que se muestra al final de la barra de navegacion -->
					<span class="navbar-text">
						<ul class="navbar-nav">
							<li class="nav-item dropdown">
								<!-- Boton que obtendra por medio de PHP el nombre de usuario y un menu -->
								<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-bs-toggle="dropdown" data-bd-display="static" data-bs-display="static" aria-expanded="false"><i class="bi bi-person-circle"></i>
								</button>
								<!-- Menu que se obtendra al presionar sobre nuestro nombre de usuario -->
								<ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
									<li class="text-center"><?php echo $_SESSION['usuario']; ?><hr class="dropdown-divider"></li>
									<!-- Enlace que redirecciona a la pagina de ver registros -->
									<li><a class="dropdown-item text-center" href="reservas/reservasU.php"> Mis reservas </a></li>
									<!-- Enlace que redirecciona al archivo cerrar sesion.php -->
									<li><a class="dropdown-item text-center" href="../../login/cerrar_sesion.php"> Cerrar sesión </a></li>
								</ul>
							</li>
						</ul>
					</span>
				</div>
			</div>
		</nav>
	</header>

	<main>
		<section>
			<img src="../../assets/img/Background-home.png" class="img-fluid" alt="Portada">
		</section>

		<article class="text-center">
			<span> Stock de vehiculos </span>
			<h2> Tenemos todo tipo de vehiculos </h2>
		</article>

		<section class="py-5">
			<article class="container">
				<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
					<div class="col">
						<div class="card shadow-sm">
							<img src="../../assets/img/Nissan-sentra.jpg" alt="IMG_1" class="img-fluid">
							<div class="card-body">
								<h3 class="fw-bold"> Nissan Sentra </h3>
                <span class="fw-bold fs-5" style="color: #d90429;"> $50.00 Diarios </span>
                <p class="card-text"><i class="bi-star"></i> (6 Reviews). </p>
                <a href="rentar.php?car=<?php echo 'Nissan Sentra'; ?>&precio=50.00" class="btn btn-outline-danger" role="button"> Rentar </a>
                <a class="btn btn-outline-danger" href="../../catalogo/sentra.html" 
                role="button"> Ver detalles </a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card shadow-sm">
							<img src="../../assets/img/toyota-corolla.jpg" alt="IMG_2" class="img-fluid">
							<br>
							<div class="card-body">
								<h3 class="fw-bold"> Toyota Corolla </h3>
                <span class="fw-bold fs-5" style="color: #d90429;"> $56.00 Diarios</span>
                <p class="card-text"><i class="bi-star"></i> (6 Reviews). </p>
                <a href="rentar.php?car=<?php echo 'Toyota Corolla'; ?>&precio=56.00" class="btn btn-outline-danger" role="button"> Rentar </a>
                <a class="btn btn-outline-danger" href="../../catalogo/toyota.html" 
                role="button"> Ver detalles </a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card shadow-sm">
							<img src="../../assets/img/kia-soul.jpg" alt="IMG_3" class="img-fluid">
							<div class="card-body">
								<h3 class="fw-bold"> Kia Soul </h3>
                <span class="fw-bold fs-5" style="color: #d90429;"> $60.00 Diarios </span>
                <p class="card-text"><i class="bi-star"></i> (6 Reviews). </p>
                <a href="rentar.php?car=<?php echo 'Kia Soul'; ?>&precio=60.00" class="btn btn-outline-danger" role="button"> Rentar </a>
                <a class="btn btn-outline-danger" href="../../catalogo/kia.html"
                role="button"> Ver detalles </a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card shadow-sm">
							<img src="../../assets/img/hyundai-accent.jpg" alt="IMG_4" class="img-fluid">
							<div class="card-body">
								<h3 class="fw-bold"> Hyundai Accent </h3>
                <span class="fw-bold fs-5" style="color: #d90429;"> $75.00 Diarios </span>
                <p class="card-text"><i class="bi-star"></i> (6 Reviews). </p>
                <a href="rentar.php?car=<?php echo 'Hyundai Accent'; ?>&precio=75.00" class="btn btn-outline-danger" role="button"> Rentar </a>
                <a class="btn btn-outline-danger" href="../../catalogo/hyundai.html" 
                role="button"> Ver detalles </a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card shadow-sm">
							<img src="../../assets/img/toyota4x4.jpg" alt="IMG_5" class="img-fluid">
							<br>
							<div class="card-body">
								<h3 class="fw-bold"> Toyota Hilux </h3>
                <span class="fw-bold fs-5" style="color: #d90429;"> $100.00 Diarios </span>
                <p class="card-text"><i class="bi-star"></i> (6 Reviews). </p>
                <a href="rentar.php?car=<?php echo 'Toyota Hilux'; ?>&precio=100.00" class="btn btn-outline-danger" role="button"> Rentar </a>
                <a class="btn btn-outline-danger" href="../../catalogo/hilux.html" 
                role="button"> Ver detalles </a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card shadow-sm">
							<img src="../../assets/img/toyota-prado.jpg" alt="IMG_6" class="img-fluid">
							<div class="card-body">
								<h3 class="fw-bold"> Toyota Prado </h3>
                <span class="fw-bold fs-5" style="color: #d90429;"> $175.00 Diarios </span>
                <p class="card-text"><i class="bi-star"></i> (6 Reviews). </p>
                <a href="rentar.php?car=<?php echo 'Toyota Prado'; ?>&precio=175.00" class="btn btn-outline-danger" role="button"> Rentar </a>
                <a class="btn btn-outline-danger" href="../../catalogo/prado.html"
                role="button"> Ver detalles </a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card shadow-sm">
							<img src="../../assets/img/BMW.jpg" alt="IMG_7" class="img-fluid">
							<br>
							<div class="card-body">
								<h3 class="fw-bold"> BMW Series 3 </h3>
                <span class="fw-bold fs-5" style="color: #d90429;"> $250.00 Diarios </span>
                <p class="card-text"><i class="bi-star"></i> (6 Reviews). </p>
                <a href="rentar.php?car=<?php echo 'BMW Series 3'; ?>&precio=250.00" class="btn btn-outline-danger" role="button"> Rentar </a>
                <a class="btn btn-outline-danger" href="../../catalogo/bmw.html"
                role="button"> Ver detalles </a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card shadow-sm">
							<img src="../../assets/img/Camaro.jpg" alt="IMG_8" class="img-fluid">
							<div class="card-body">
								<h3 class="fw-bold"> Chevrolet Camaro </h3>
                <span class="fw-bold fs-5" style="color: #d90429;"> $260.00 Diarios </span>
                <p class="card-text"><i class="bi-star"></i> (6 Reviews). </p>
                <a href="rentar.php?car=<?php echo 'Chevrolet Camaro'; ?>&precio=260.00" class="btn btn-outline-danger" role="button"> Rentar </a>
                <a class="btn btn-outline-danger" href="../../catalogo/camaro.html"
                role="button"> Ver detalles </a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card shadow-sm">
							<img src="../../assets/img/Mustang.jpg" alt="IMG_9" class="img-fluid">
							<div class="card-body">
								<h3 class="fw-bold"> Ford Mustang </h3>
                <span class="fw-bold fs-5" style="color: #d90429;"> $300.00 Diarios </span>
                <p class="card-text"><i class="bi-star"></i> (6 Reviews). </p>
                <a href="rentar.php?car=<?php echo 'Ford Mustang'; ?>&precio=300.00" class="btn btn-outline-danger" role="button"> Rentar </a>
                <a class="btn btn-outline-danger" href="../../catalogo/mustang.html"
                role="button"> Ver detalles </a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card shadow-sm">
							<img src="../../assets/img/Masserati.jpg" alt="IMG_10" class="img-fluid">
							<div class="card-body">
								<h3 class="fw-bold"> Masserati </h3>
                <span class="fw-bold fs-5" style="color: #d90429;"> $550.00 Diarios </span>
                <p class="card-text"><i class="bi-star"></i> (6 Reviews). </p>
                <a href="rentar.php?car=<?php echo 'Masserati'; ?>&precio=550.00" class="btn btn-outline-danger" role="button"> Rentar </a>
                <a class="btn btn-outline-danger" href="../../catalogo/maserati.html"
                role="button"> Ver detalles </a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card shadow-sm">
							<img src="https://www.chevrolet.com.pa/content/dam/chevrolet/na/mx/es/index/cars/2019-spark/colorizer/01-images/2019-spark-plata-brillante-imwidth=1200.png" alt="IMG_11" class="img-fluid">
							<br>
							<div class="card-body">
								<h3 class="fw-bold"> Chevrolet Spark GT </h3>
								<span class="fw-bold fs-5" style="color: #d90429;"> $160.00 Diarios </span>
								<p class="card-text"><i class="bi-star"></i> (6 Reviews). </p>
								<a href="rentar.php?car=<?php echo 'Chevrolet Spark GT'; ?>&precio=160.00" class="btn btn-outline-danger" role="button"> Rentar </a>
								<a class="btn btn-outline-danger" href="../../catalogo/spark.html"
                                role="button"> Ver detalles </a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card shadow-sm">
							<img src="../../assets/img/proximamente.jpg" alt="IMG_12" class="img-fluid">
							<div class="card-body">
								<h3> - </h3>
                <span> - </span>
                <p class="card-text"><i class="bi-star"></i> Nuevos carros proximamente. </p>
							</div>
						</div>
					</div>
				</div>
			</article>
		</section>
	</main>

	<footer class="p-4 bg-dark text-white border-top border-danger border-3">
    <div class="d-flex justify-content-between">
      <p> ©2022 BadBunny. Derechos reservados. </p>
      <div class="d-flex justify-content-end">
        <ul class="list-unstyled d-flex">
          <li class="ms-3"><a class="bi-instagram link-light fs-4" href="#"></a></li>
          <li class="ms-3"><a class="bi bi-twitter link-light fs-4" href="#"></a></li>
          <li class="ms-3"><a class="bi bi-facebook link-light fs-4" href="#"></a></li>
          <li class="ms-3"><a class="bi bi-telegram link-light fs-4" href="#"></a></li>
        </ul>
      </div>
    </div>
  </footer>

	<!-- Enlace a las librerias de JavaScript de Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>