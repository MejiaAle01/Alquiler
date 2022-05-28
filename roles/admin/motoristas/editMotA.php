<?php
	//Conexion a la base de datos
	$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	if (isset($_REQUEST['id'])) {
		$editIDM = $_REQUEST['id'];

		$exec = mysqli_query($conn, "SELECT * FROM motoristas WHERE ID_MOT = '$editIDM'");

		$fila = mysqli_fetch_assoc($exec);

		$editIDM = $fila['ID_MOT'];
		$nameMo = $fila['Nombre_mot'];
		$edadMo = $fila['Edad'];
		$telMo = $fila['Telefono'];
		$hourMo = $fila['Horario'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Editor de motoristas </title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary">
	<!-- Form y main -->
	<main class="p-0 m-5 d-flex justify-content-center">
		<section>
			<form method="POST" class="rounded-3 shadow bg-white" action="">
				<h3 class="mb-3 border-bottom border-1 text-center"> Editar motorista </h3>
				<div class="row mb-3">
					<label for="ID" class="col-sm-5 ms-1 col-form-label"> ID: </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="ID" disabled value="<?php echo $editIDM; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="nameMotorista" class="col-sm-5 ms-1 col-form-label"> Editar motorista: </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="nameMot" required value="<?php echo $nameMo; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="edadMo" class="col-sm-5 ms-1 col-form-label"> Editar edad: </label>
					<div class="col-sm-6">
						<input type="number" min="0" max="100" class="form-control" name="edadM" required value="<?php echo $edadMo; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="telMot" class="col-sm-5 ms-1 col-form-label"> Editar telefono: </label>
					<div class="col-sm-6">
						<input type="number" class="form-control" name="telfMot" required value="<?php echo $telMo; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="HourMot" class="col-sm-5 ms-1 col-form-label"> Editar el horario: </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="hourMot" required value="<?php echo $hourMo; ?>">
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<button type="submit" class="btn btn-outline-primary" name="actualizar" role="button"> Actualizar </button>
					<a class="btn btn-outline-secondary ms-2" href="motoristasA.php"> Regresar </a>
				</div>
			</form>
			<?php
				if (isset($_POST['actualizar'])) {
					// Recibimos los datos que se enviaron desde el FORM
					$upd_nameM = $_POST['nameMot'];
					$upd_edadM = $_POST['edadM'];
					$upd_telM = $_POST['telfMot'];

					// Ejecutamos la sentencia junto con la conexion
					$exec = mysqli_query($conn, "UPDATE motoristas SET Nombre_mot = '$upd_nameM', Edad = '$upd_edadM', Telefono = '$upd_telM' WHERE ID_MOT = '$editIDM'");

					//Comprobamos que los datos se registren correctamente con un mensaje
					if ($exec) {
						echo 
							'<script>
								alert("Datos actualizados correctamente!");
								window.location.href = "motoristasA.php";
							</script>'
						;
					}
				}

				// Cerramos la conexion
				mysqli_close($conn);
			?>
		</section>
	</main>

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>