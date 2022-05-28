<?php
	// Conexion a la BD
	$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	// Recibimos los datos que se enviaron desde el FORM
	$nameMot = $_POST['nameMot'];
	$edadMot = $_POST['edadMot'];
	$telMot = $_POST['telMot'];
	$hourMot = $_POST['hourMot'];

	// Ingresamos los datos junto con la conexion
	$ins = mysqli_query($conn, "INSERT INTO motoristas (Nombre_mot, Edad, Telefono, Horario) VALUES ('$nameMot','$edadMot','$telMot', '$hourMot')");

	//Comparamos el ingreso de los datos
	if (!$ins) {
		// En caso de dar error
		echo
			'<script>
				alert("Error al registrar los datos!");
				location.reload();
			</script>'
		;
	} else {
		// Cuando todo este correcto
		echo 
			'<script>
				alert("Datos registrados correctamente!");
				window.location.href = "motoristasE.php";
			</script>'
		;
	}

	//Cerramos la conexion
	mysqli_close($conn);
	
?>