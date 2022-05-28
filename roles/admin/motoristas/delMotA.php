<?php
	
	// Conexion a la base de datos
	$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	// Comparamos el id que se presiono con el requerido
	if (isset($_REQUEST['id'])) {
		$delIDM = $_REQUEST['id'];

		// Ejecutamos la consulta junto con la conexion
		$exec = mysqli_query($conn, "DELETE FROM motoristas WHERE ID_MOT = '$delIDM'");

		// Mostramos un mensaje de confirmacion
		if ($exec) {
			echo 
				'<script>
					confirm("¿Desea eliminar los datos?");
					console.log("Datos eliminados correctamente!");
					window.location.href = "motoristasA.php";
				</script>'
			;
		}
	}

	// Cerramos la conexion
	mysqli_close($conn);
?>