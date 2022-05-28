<?php
	// Conexion a la base de datos
	$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	if (isset($_REQUEST['id'])) {
		$idEnt = $_REQUEST['id'];

		// Ejecutamos el query que actualizara el estado de la entrega
		$exec = mysqli_query($conn, "DELETE FROM alquiler WHERE ID = '$idEnt'");

		// Mostramos un mensaje de confirmacion
		if ($exec) {
			echo 
				'<script>
					confirm("¿Desea eliminar los datos?");
					console.log("Datos eliminados correctamente!");
					window.location.href = "reservasE.php";
				</script>'
			;
		}
	}

	// Cerramos la conexion
	mysqli_close($conn);
?>