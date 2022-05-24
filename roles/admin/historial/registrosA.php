<?php
    session_start();

    // Conexion a la base de datos
	$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	// Preparamos una sentencia a la BD
	$cons = "SELECT * FROM usuarios";

	// Ejecutamos la consulta
	$res = mysqli_query($conn, $cons);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title> Historial de alquiler </title>
    <!-- Enlace a libreria de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Enlace a la libreria de iconos Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<section class="container-fluid">
			<a href="../index_admin.php" class="btn btn-outline-dark m-1 mb-2" role="button"><i class="bi-chevron-compact-left"></i></a>
			<div class="d-flex" aria-label="Encabezado con buscador">
				<h4 class="mb-0"> Historial de alquileres </h4>
				<form class="d-flex ms-auto">
					<label for="search" class="col-form-label me-2"> Buscar: </label>
					<input class="form-control form-control-sm search" id="buscar" type="search" aria-label="Search">
				</form>
			</div>
		</section>

		<!---->
		<section class="container-fluid table-responsive mt-3">
			<table class="table table-bordered table-hover table-striped">
				<thead class="table-light">
					<tr>
						<th scope="col"> # </th>
						<th scope="col"> Marca </th>
						<th scope="col"> Color </th>
						<th scope="col"> Modelo </th>
						<th scope="col"> Placas </th>
						<th scope="col"> Cantidad </th>
						<th scope="col"> Opciones </th>
					</tr>
				</thead>
				<tbody>
					<?php
						//Iniciamos un contador para ver el total de datos
						$i = 0;
						//Iniciamos la condicion while que obtendra todos los datos de la BD
						while ($fila = mysqli_fetch_assoc($res)) {
							$idU = $fila['ID'];
							$name = $fila['Nombre'];
							$ape = $fila['Apellido'];
							$user = $fila['Usuario'];
							$email = $fila['Correo'];
							$rol = $fila['T_user'];

							//Sumamos todo los datos obtenidos
							$i++;
					?>
					<tr>
						<!-- Mostramos los resultados obtenidos de la BD en la tabla -->
						<th scope="row"><?php echo $idU; ?></th>
						<td><?php echo $name; ?></td>
						<td><?php echo $ape; ?></td>
						<td><?php echo $user; ?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo $rol; ?></td>
						<td>
							<a href="#"><i class="bi-pencil-square" style="font-size: 1.5rem;"></i></a>
							<a href="#"><i class="bi-person-x" style="font-size: 1.5rem;"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</section>
	</main>

	<!-- Enlace a las librerias de JavaScript de Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

<?php
	mysqli_close($conn);
?>