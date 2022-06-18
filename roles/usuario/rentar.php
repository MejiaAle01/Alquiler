<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	//Continuamos con la sesion
	session_start();

	// Conexion a la base de datos
	$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	if (isset($_GET['car']) && isset($_GET['precio'])) {
		$carselect = $_GET['car'];
		$price = $_GET['precio'];

		//DATOS DE LOS CARROS DESDE LA BD
		$cons = "SELECT Marca FROM proveedores WHERE Marca = '$carselect'";

		// Iniciamos una consulta a la base de datos
		$exec = mysqli_query($conn, $cons);

		$fila = mysqli_fetch_assoc($exec);

		$marcaCar = $fila['Marca'];
	}
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
			<form action="rentU.php" method="POST" class="border rounded-3 shadow bg-light p-2">
				<h4 class="mb-3 mt-2 text-center"> Información personal </h4>
				<div class="row mb-3">
					<label for="SelectedCar" class="col-sm-5 col-form-label"> Carro seleccionado: </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="carselect" required value="<?php echo $marcaCar; ?>" readonly>
					</div>
				</div>
				<div class="row mb-3">
					<label for="Precio" class="col-sm-5 col-form-label"> Precio (en $): </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="precio" readonly value="<?php echo $price; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<!-- AQUI IRA EL NOMBRE DEL USUARIO TRAIDO DE LA BD -->
					<label for="Nombre" class="col-sm-5 col-form-label"> Nombre completo: </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="nombre" required>
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
						<input type="text" class="form-control" name="telefono" required>
					</div>
				</div>
				<div class="row mb-3">
					<label for="Categoria" class="col-sm-5 col-form-label"> Tipo de carro: </label>
					<div class="col-sm-5">
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
					<label for="FechaRetiro" class="col-sm-5 col-form-label"> Fecha y hora de retiro: </label>
					<div class="col-sm-6">
						<input type="datetime-local" class="form-control" name="fretiro" value="">
					</div>
				</div>
				<div class="row mb-3">
					<label for="FechaDevol" class="col-sm-5 col-form-label"> Fecha y hora de devolución: </label>
					<div class="col-sm-6">
						<input type="datetime-local" class="form-control" name="fdevolucion" value="">
					</div>
				</div>
				<div class="row mb-3">
					<label for="Entrega" class="col-sm-5 col-form-label"> Entrega por: </label>
					<div class="col-sm-5">
						<select name="entregaAlq" class="form-select">
							<option value="Domicilio"> Domicilio </option>
							<option value="Empresa"> Empresa </option>
						</select>
					</div>
				</div>
				<div class="row mb-3">
					<label for="Motorista" class="col-sm-5 col-form-label"> Seleccione un motorista: </label>
					<div class="col-sm-6">
						<select name="motorista" class="form-select">
							<option value="Sin motorista"> Sin motorista </option>
								<?php

									$i = 0;

									$execMot = mysqli_query($conn, "SELECT Nombre_mot FROM motoristas");
									while ($filaMot = mysqli_fetch_assoc($execMot)){
										echo '<option value="'.$filaMot['Nombre_mot'].'">'.$filaMot['Nombre_mot'].'</option>';
									}

									$i++;
								?>
						</select>
					</div>
				</div>
				<div class="row mb-3">
					<label for="CardCredit" class="col-sm-5 col-form-label"> Método de pago: </label>
					<div class="col-sm-7">
						<input class="form-check-input" type="radio" value="Agregar" name="tarjeta" data-bs-toggle="modal" data-bs-target="#exampleModal">
						<img src="https://assets.static-bahn.de/dam/jcr:76ef9714-ce76-4edf-8475-3c79840de0f8/241960-321268.jpg" alt="marcas" height="50" width="200">
						<br>
						<input type="radio" class="form-check-input" name="tarjeta">
						<img src="https://rehileteproyectos.com/wp-content/uploads/2017/09/paypal.png" alt="paypal" height="50" width="200">
					</div>
				</div>
				<div class="row mb-3">
					<label for="TotalPago" class="col-sm-5 col-form-label"> Cantidad a pagar (en $): </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="tpago" readonly value="">
					</div>
				</div>
				<input type="hidden" name="state" value="Pendiente">

				<!-- Boton que llamara al Modal -->
				<div class="d-flex justify-content-center">
					<button type="submit" class="btn btn-outline-primary" value="Reservar" role="button" name="reservar"><i class="bi-clipboard-check"></i> Reservar </button>
				</div>
			</form>
		</section>

		<!-- Modal -->
		<section class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"> Datos de la tarjeta </h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<article class="modal-body">
						<form action="#" method="POST" autocomplete="off">
							<div class="row mb-3">
								<label for="NumCard" class="col-sm-5 col-form-label"> Numero de tarjeta: </label>
								<div class="input-group col">
									<span class="input-group-text"><i class="bi-credit-card"></i></span>
									<input type="text" class="form-control" name="num_card" required minlength="0" maxlength="16">
								</div>
							</div>
							<div class="row mb-3">
								<label for="NombreTarjeta" class="col-sm-5 col-form-label"> Nombre del titular: </label>
								<div class="col-sm-7">
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
									<input type="text" class="form-control" name="codseg">
								</div>
							</div>
							<div class="d-flex justify-content-center">
								<input type="submit" class="btn btn-outline-primary" value="$ Pagar" role="button">
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php mysqli_close($conn); ?>