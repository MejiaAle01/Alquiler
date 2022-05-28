<?php
	session_start();

	// Conexion a la base de datos
	$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	// Traemos los datos desde la BD
	$exec = mysqli_query($conn, "SELECT * FROM motoristas");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Lista de motoristas </title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-md navbar-dark bg-dark">
			<!-- Etiquetas de contenedor que contendran al nav de nuestra pag -->
			<div class="container-fluid">
				<!-- Boton que aparecera al visitar la pagina desde una dimension de pantalla diferente -->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<!-- Icono del boton que aparecera al ser pantalla responsiva -->
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
									<li>
										<a class="dropdown-item text-center" href="../../../login/cerrar_sesion.php"> Cerrar sesión </a>
									</li>
								</ul>
							</li>
						</ul>
					</span>
				</div>
			</div>
		</nav>
	</header>

	<main>
		<article class="container-fluid">
			<a href="../index_admin.php" class="btn btn-outline-dark m-1" role="button"><i class="bi-chevron-compact-left"></i></a>
			<div class="d-flex mt-2">
				<h4 class="mb-0"> Motoristas </h4>
			</div>
		</article>

		<section class="container-fluid table-responsive mt-3">
			<button type="button" class="btn btn-outline-dark m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi-file-earmark-person"></i> Nuevo motorista </button>
			<table class="table table-bordered table-hover table-striped">
				<thead class="table-light">
					<tr>
						<th scope="col"> # </th>
						<th scope="col"> Nombre del motorista </th>
						<th scope="col"> Edad </th>
						<th scope="col"> Teléfono </th>
						<th scope="col"> Horario </th>
						<th scope="col"> Opciones </th>
					</tr>
				</thead>
				<tbody>
					<?php
						//Iniciamos un contador para ver el total de datos
						$i = 0;
						//Iniciamos la condicion while que obtendra todos los datos de a BD
						while ($fila = mysqli_fetch_assoc($exec)) {
							$idMot = $fila['ID_MOT'];
							$nameMot = $fila['Nombre_mot'];
							$edadMot = $fila['Edad'];
							$telMot = $fila['Telefono'];
							$hourMot = $fila['Horario'];

						//Sumamos todo los datos obtenidos
						$i++;
					?>
					<tr>
						<!-- Mostramos los resultados obtenidos de la BD en la tabla -->
						<td scope="row"><?php echo $idMot; ?></td>
						<td><?php echo $nameMot; ?></td>
						<td><?php echo $edadMot; ?></td>
						<td><?php echo $telMot; ?></td>
						<td><?php echo $hourMot; ?></td>
						<td>
							<a href="editMotA.php?id=<?php echo $idMot; ?>"><i class="bi-pencil-square" style="font-size: 1.5rem;"></i></a>
							<a href="delMotA.php?id=<?php echo $idMot; ?>"><i class="bi-person-x" style="font-size: 1.5rem;"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</section>

		<!-- Modal -->
		<section class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"> Nuevo motorista </h5>
					</div>
					<article class="modal-body">
						<form autocomplete="off" method="POST" action="crMotA.php">
							<div class="row mb-2">
								<label for="nameMot" class="col-sm-5 col-form-label"> Ingrese el nombre: </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nameMot" required>
								</div>
							</div>
							<div class="row mb-2">
								<label for="EdadMot" class="col-sm-5 col-form-label"> Ingrese la edad: </label>
								<div class="col-sm-6">
									<input type="number" min="0" max="100" class="form-control" name="edadMot" required>
								</div>
							</div>
							<div class="row mb-2">
								<label for="TelMot" class="col-sm-5 col-form-label"> Ingrese el teléfono: </label>
								<div class="col-sm-6">
									<input type="number" class="form-control" name="telMot" required>
								</div>
							</div>
							<div class="row mb-2">
								<label for="HourMot" class="col-sm-5 col-form-label"> Ingrese el horario: </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="hourMot" required>
								</div>
							</div>
							<div class="d-flex justify-content-center">
								<input type="submit" class="btn btn-outline-primary" value="Registrarse" role="button">
								<button type="button" class="btn btn-outline-secondary ms-2" data-bs-dismiss="modal"> Cerrar </button>
							</div>
						</form>
					</article>
				</div>
			</div>
		</section>
	</main>

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>