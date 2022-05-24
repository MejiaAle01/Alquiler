<?php
	//Continuamos con la sesion
	session_start();

	// Conexion a la base de datos
	//$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	/*if (isset($_REQUEST['car'])) {
		$carselect = $_REQUEST['car'];

		//DATOS DE LOS CARROS DE LA BD
	}*/


	// Consultamos la base de datos
	//$cons = "SELECT * FROM alquiler";

	// Iniciamos una consulta a la base de datos
	//$res = mysqli_query($conn, $cons);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Enlace a libreria CSS de Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- Enlace a la libreria de iconos de Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<title> Rentar </title>
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
		<section class="container p-2 d-flex justify-content-start">
			<div class="row">
				<div class="col">
					<form action="rentU.php" method="POST" class="border rounded-3 shadow bg-light p-2">
						<h4 class="mb-3 mt-2 text-center"> Información personal </h4>
						<div class="row mb-3">
							<!-- AQUI IRA EL NOMBRE DEL USUARIO TRAIDO DE LA BD -->
							<label for="Nombre" class="col-sm-5 col-form-label"> Carro seleccionado: </label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="carselect" required>
							</div>
						</div>
						<div class="row mb-3">
							<!-- AQUI IRA EL NOMBRE DEL USUARIO TRAIDO DE LA BD -->
							<label for="Nombre" class="col-sm-5 col-form-label"> Nombre completo: </label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="nombre" required value="Alejandro">
							</div>
						</div>
						<div class="row mb-3">
							<label for="CCarros" class="col-sm-5 col-form-label"> Cantidad de carros: </label>
							<div class="col-sm-3">
								<input type="number" min="1" max="20" class="form-control" name="ccarros" required>
							</div>
						</div>
						<div class="row mb-3">
							<label for="Celular" class="col-sm-5 col-form-label"> Teléfono: </label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="telefono" required value="">
							</div>
						</div>
						<div class="row mb-3">
							<label for="Categoria" class="col-sm-5 col-form-label"> Tipo de carro: </label>
							<div class="col-sm-6">
								<select name="tcar" class="form-select">
									<option value="Estandar"> Estándar </option>
									<option value="Automatico"> Automático </option>
									<option value="Combinado"> Combinado </option>
								</select>
							</div>
						</div>
						<div class="row mb-3">
							<label for="Residencia" class="col-sm-5 col-form-label"> Residencia: </label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="direccion" required value="">
							</div>
						</div>
						<div class="row mb-3">
							<label for="FechaRetiro" class="col-sm-5 col-form-label"> Fecha de retiro: </label>
							<div class="col-sm-6">
								<input type="date" class="form-control" name="fretiro" value="">
							</div>
						</div>
						<div class="row mb-3">
							<label for="FechaDevol" class="col-sm-5 col-form-label"> Fecha de devolución: </label>
							<div class="col-sm-6">
								<input type="date" class="form-control" name="fdevolucion" value="">
							</div>
						</div>
						<div class="row mb-3">
							<label for="FechaDevol" class="col-sm-5 col-form-label"> Fecha de devolución: </label>
							<div class="col-sm-6">
								<input type="checkbox" value="Si" class="form-check-input" name="opsi">
								<label for="OpSi" class="form-check-label"> Si </label>
								<input type="checkbox" value="No" class="form-check-input ms-2" name="opno">
								<label for="OpNo" class="form-check-label"> No </label>
							</div>
						</div>
						<div class="row mb-3">
							<label for="Motorista" class="col-sm-5 col-form-label"> Motorista: </label>
							<div class="input-group w-50">
								<span class="input-group-text"><i class="bi-person-bounding-box"></i></span>
								<select name="motoristas" class="form-select">
									<option value="1"> Jose Alejandro Mejia Ceron </option>
								</select>
							</div>
						</div>

						<!-- Boton que llamara al Modal -->
						<div class="d-flex justify-content-center">
							<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi-credit-card"></i> Agregar tarjeta de crédito </button>
							<input type="submit" class="btn btn-outline-primary ms-4" value="Reservar" role="button">
						</div>
					</form>
				</div>
			</div>
		</section>

		<!-- Modal -->
		<section class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"> Datos de pago </h5>
					</div>
					<article class="modal-body">
						<form action="#" method="POST" autocomplete="off">
							<div class="row mb-3">
								<label for="NumCard" class="col-sm-5 col-form-label"> Numero de tarjeta: </label>
								<div class="input-group w-50">
									<span class="input-group-text"><i class="bi-credit-card"></i></span>
									<input type="number" maxlength="10" class="form-control" name="num_card" required>
								</div>
							</div>
							<div class="row mb-3">
								<label for="NombreTarjeta" class="col-sm-5 col-form-label"> Nombre del titular: </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="titular" value="" required>
								</div>
							</div>
							<div class="row mb-3">
								<label for="Expires" class="col-sm-5 col-form-label"> Fecha de vencimiento: </label>
								<div class="col-sm-6">
									<input type="month" class="form-control" name="fvenc" value="">
								</div>
							</div>
							<div class="row mb-3">
								<label for="Expires" class="col-sm-5 col-form-label"> Código de seguridad: </label>
								<div class="col-sm-3">
									<input type="number" maxlength="3" class="form-control" name="codseg">
								</div>
							</div>
							<div class="row mb-3">
								<label for="Pago" class="col-sm-5 col-form-label"> Cantidad a pagar: </label>
								<div class="col-sm-3">
									<input type="number" step="any" class="form-control" name="pago" disabled>
								</div>
							</div>
							<div class="d-flex justify-content-center">
								<input type="submit" class="btn btn-outline-primary" value="$ Pagar" role="button">
								<button type="button" class="btn btn-outline-secondary ms-2" data-bs-dismiss="modal"> Cerrar </button>
							</div>
						</form>
					</article>
				</div>
			</div>
		</section>
	</main>

	<style>
		main {
			background-image: url('../../assets/img/Car-Portada.png');
			background-position: center;
			background-size: cover;
			background-attachment: fixed;
			background-repeat: no-repeat;
		}
	</style>

	<!-- Enlace a las librerias de JavaScript de Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>