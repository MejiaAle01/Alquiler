<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title> Detalles civic </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Enlace a libreria CSS de Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- Enlace a la libreria de iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
	<!-- Barra de navegacion -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<!-- Contenedor -->
		<div class="container-fluid">
			<!-- Boton que aparecera al visitar la pagina desde una dimension de pantalla diferente -->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<!-- Icono del boton que aparecera al ser pantalla responsiva -->
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- Contenedor con menu -->
			<div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<!-- Logo -->
					<img src="https://img.icons8.com/color/48/000000/traffic-jam.png" alt="Logo" width="30">
				</ul>
				<!-- Contenedor con enlaces -->
				<div class="d-flex">
					<!-- Enlace al login -->
					<a href="../login/login.php" class="btn text-white" role="button"> Iniciar sesión </a>
					<!-- Enlace al registro -->
					<a href="../login/registrar.php" class="btn text-white" role="button"> Registrarse </a>
				</div>
			</div>
		</div>
	</nav>

	<!-- Etiqueta principal de toda la pagina -->
	<main>
		<!-- Contenedor con padding de 4 -->
		<div class="py-4 container">
			<!-- Encabezado -->
			<header class="d-flex justify-content-center border-bottom">
				<i class="bi-camera me-2" style="font-size: 25px;"><span class="fs-4 fst-normal"> HONDA CIVIC DETALLES </span></i>
			</header>
			<!-- Contenedor con tarjetas en forma de columnas -->
			<div class="py-1 bg-light">
				<div class="container">
					<div class="row row-cols-1 row-cols-md-3 g-4">
						<!-- Tarjeta 1 -->
						<div class="col">
							<div class="card shadow-sm">
								<img src="../assets/img/honda-civi.jpg" class="img-fluid" alt="IMG_1">
								<div class="card-body">
									<ul class="fs-6">
										<li> 146 lb-pies de torque a 4,000 rpm. </li>
										<li> Gasolina de inyección directa (DIG). </li>
										<li> Combustible regular sin plomo. </li>
									</ul>
								</div>
							</div>
						</div>
						<!-- Tarjeta 2 -->
						<div class="col">
							<div class="card shadow-sm">
								<img src="../assets/img/hon-da.jpg" class="img-fluid" alt="IMG_2">
								<div class="card-body">
									<ul style="font-size: 18px;">
										<li> Cantidad de asientos 5. </li>
										<li> Tanque de combustible (galones) 12.4. </li>
										<li> Estándar. </li>
									</ul>
								</div>
							</div>
						</div>
						<!-- Tarjeta 3 -->
						<div class="col">
							<div class="card shadow-sm">
								<img src="../assets/img/inte.jpg" class="img-fluid" alt="IMG_3">
								<div class="card-body">
									<ul style="font-size: 17px;">
										<li> Respaldado por la garantia limitada de Honda, 3 años/36,000 millas (en el momento de la compra). </li>
									</ul>
									<!--<p class="card-text">
										Respaldado por la garantía limitada de Honda (si los instala en el concesionario en el momento de la compra) por 3 años/36,000 millas (lo que ocurra primero).
									</p>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

	<footer class="p-4 bg-dark text-white" style="border-top: 2px solid #d90429;">
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

	<!-- Enlace a la libreria de JavaScript de Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>