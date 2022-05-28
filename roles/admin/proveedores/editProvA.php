<?php

	//Conexion a la base de datos
	$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	if (isset($_REQUEST['id'])) {
		$editIDP = $_REQUEST['id'];

		$exec = mysqli_query($conn, "SELECT * FROM proveedores WHERE ID = '$editIDP'");

		$fila = mysqli_fetch_assoc($exec);

		$editIDP = $fila['ID'];
		$nameP = $fila['Proveedor'];
		$markP = $fila['Marca'];
		$cantCarP = $fila['CantCar'];
		$yearCP = $fila['Año'];
		$placasCP = $fila['Placas'];
		$polCP = $fila['Poliza'];
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Editor gestor de proveedores </title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary">
	<!-- Form y main -->
	<main class="p-0 m-5 d-flex justify-content-center">
		<section>
			<form method="POST" class="rounded-3 shadow bg-white" action="">
				<h3 class="mb-3 border-bottom border-1 text-center"> Editar proveedor </h3>
				<div class="row mb-3">
					<label for="ID" class="col-sm-5 ms-1 col-form-label"> ID: </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="ID" disabled value="<?php echo $editIDP; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="proveedor" class="col-sm-5 ms-1 col-form-label"> Editar proveedor: </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="namePr" required value="<?php echo $nameP; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="marcaP" class="col-sm-5 ms-1 col-form-label"> Editar marca: </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="marcaPr" required value="<?php echo $markP; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="cantidadCP" class="col-sm-5 ms-1 col-form-label"> Editar cantidad: </label>
					<div class="col-sm-6">
						<input type="number" class="form-control" name="cantidadCPr" required value="<?php echo $cantCarP; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="añoCP" class="col-sm-5 ms-1 col-form-label"> Editar año del carro: </label>
					<div class="col-sm-6">
						<input type="number" class="form-control" name="añoCPr" required value="<?php echo $yearCP; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="placasCP" class="col-sm-5 ms-1 col-form-label"> Editar placas: </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="placasCPr" required value="<?php echo $placasCP; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="poliCP" class="col-sm-5 ms-1 col-form-label"> Editar poliza del carro: </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="poliCPr" required value="<?php echo $polCP; ?>">
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<button type="submit" class="btn btn-outline-primary" name="actualizar" role="button"> Actualizar </button>
					<a class="btn btn-outline-secondary ms-2" href="proveedoresA.php"> Regresar </a>
				</div>
			</form>
			<?php
				if (isset($_POST['actualizar'])) {
					// Recibimos los datos que se enviaron desde el FORM
					$upd_nameP = $_POST['namePr'];
					$upd_marcaP = $_POST['marcaPr'];
					$upd_cantidadP = $_POST['cantidadCPr'];
					$upd_yearP = $_POST['añoCPr'];
					$upd_placasCP = $_POST['placasCPr'];
					$upd_poliCP = $_POST['poliCPr'];

					// Ejecutamos la sentencia junto con la conexion
					$exec = mysqli_query($conn, "UPDATE proveedores SET Proveedor = '$upd_nameP', Marca = '$upd_marcaP', CantCar = '$upd_cantidadP', Año = '$upd_yearP', Placas = '$upd_placasCP', Poliza = '$upd_poliCP' WHERE ID = '$editIDP'");

					//Comprobamos que los datos se registren correctamente con un mensaje
					if ($exec) {
						echo 
							'<script>
								alert("Datos actualizados correctamente!");
								window.location.href = "proveedoresA.php";
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