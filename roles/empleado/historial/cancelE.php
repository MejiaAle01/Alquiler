<?php
	// Conexion a la base de datos
	$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	if (isset($_REQUEST['id'])) {
		$idEnt = $_REQUEST['id'];

		// Ejecutamos el query que actualizara el estado de la entrega
		$exec = mysqli_query($conn, "UPDATE alquiler SET Estado = 'Cancelado' WHERE alquiler.ID = '$idEnt'");

		// Mostramos un mensaje de confirmacion
		echo '
			<script>
				alert("Cancelacion exitosa!");
				window.location.href = "reservasE.php";
			</script>'
		;
	}

	// Cerramos la conexion
	mysqli_close($conn);
?>