<?php
	//Conexion a la base de datos
	$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	if (isset($_REQUEST['id'])) {
		$editarUID = $_REQUEST['id'];

		$cons = "SELECT * FROM usuarios WHERE ID = '$editarUID'";

		$exec = mysqli_query($conn, $cons);

		$fila = mysqli_fetch_assoc($exec);

		$editarUID = $fila['ID'];
		$name = $fila['Nombre'];
		$ape = $fila['Apellido'];
		$user = $fila['Usuario'];
		$email = $fila['Correo'];
		$rol = $fila['T_user'];

	}

	/*$cons = "SELECT * FROM usuarios WHERE ID = '".$_REQUEST['id']."' ";

	$exec = mysqli_query($conn, $cons);

	if ($fila = mysqli_fetch_assoc($exec)) {
		$id = $fila['ID'];
		$name = $fila['Nombre'];
		$ape = $fila['Apellido'];
		$user = $fila['Usuario'];
		$email = $fila['Correo'];
		$rol = $fila['T_user'];
	}*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Editor gestor de usuarios </title>
	<!-- Enlace a libreria CSS de Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-secondary">
	<!-- Form y main -->
	<main class="p-0 m-5 d-flex justify-content-center">
		<section>
			<form method="POST" class="rounded-3 shadow bg-white" action="">
				<h3 class="mb-3 border-bottom border-1 text-center"> Editar usuarios </h3>
				<div class="row mb-3">
					<label for="nombre" class="col-sm-5 ms-1 col-form-label"> ID: </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="ID" required disabled value="<?php echo $editarUID; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="nombre" class="col-sm-5 ms-1 col-form-label"> Editar nombre: </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="nombre" id="nombre" required value="<?php echo $name; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="apellido" class="col-sm-5 ms-1 col-form-label"> Editar apellido: </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="apellido" id="apellido" required value="<?php echo $ape; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="usuario" class="col-sm-5 ms-1 col-form-label"> Editar usuario: </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="usuario" id="usuario" required value="<?php echo $user; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="usuario" class="col-sm-4 ms-1 col-form-label"> Editar correo: </label>
					<div class="col-sm-7">
						<input type="email" class="form-control" name="correo" id="correo" required value="<?php echo $email; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="usuario" class="col-sm-5 ms-1 col-form-label"> Editar rol: </label>
					<div class="col-sm-6">
						<select class="form-select" name="tipousuario" aria-label="Seleccion de roles">
							<option><?php echo "$rol"; ?></option>
							<option disabled> ────────────── </option>
							<option value="Administrador"> Administrador </option>
							<option value="Empleado"> Empleado </option>
							<option value="Usuario"> Usuario </option>
						</select>
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<button type="submit" class="btn btn-outline-primary" name="actualizar" role="button"> Actualizar </button>
					<a class="btn btn-outline-secondary ms-2" href="gUser.php"> Regresar </a>
				</div>
			</form>
			<?php
				if (isset($_POST['actualizar'])) {
					
					// Recibimos los datos que se enviaron desde el FORM
					$upd_name = $_POST['nombre'];
					$upd_ape = $_POST['apellido'];
					$upd_user = $_POST['usuario'];
					$upd_email = $_POST['correo'];
					$upd_rol = $_POST['tipousuario'];

					// Creamos la sentencia que actualizara los datos
					$upd = "UPDATE usuarios SET Nombre = '$upd_name', Apellido = '$upd_ape', Usuario = '$upd_user', Correo = '$upd_email', T_user = '$upd_rol' WHERE ID = '$editarUID'";

					$exec = mysqli_query($conn, $upd);

					if ($exec) {
						echo 
							'<script>
								alert("Datos actualizados correctamente!");
								window.location.href = "gUser.php";
							</script>'
						;
					}
				}

				mysqli_close($conn);
			?>
		</section>
	</main>

	<!--Enlace a las librerias de JavaScript de Bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>