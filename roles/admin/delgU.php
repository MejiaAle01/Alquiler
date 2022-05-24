<?php
	// Conexion a la base de datos
	$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	if (isset($_REQUEST['id'])) {
		$delUID = $_REQUEST['id'];

		$del = "DELETE FROM usuarios WHERE ID = '$delUID'";

		$exec = mysqli_query($conn, $del);

		if ($exec) {
			echo 
				'<script>
					confirm("¿Desea eliminar los datos?");
					console.log("Datos eliminados correctamente!");
					window.location.href = "gUser.php";
				</script>'
			;
		}
	}

	mysqli_close($conn);
?>