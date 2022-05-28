<?php

	// Conexion a la BD
	$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	// Recibimos los datos que se enviaron a traves del FORM
	$namePA = $_POST['nameProv'];
	$markPA = $_POST['markProv'];
	$cantCPA = $_POST['cantCProv'];
	$yearCPA = $_POST['yearCProv'];
	$placasCPA = $_POST['placasCProv'];
	$polizaCPA = $_POST['polizaCProv'];

	// Ingresamos los datos junto con la conexion
	$ins = mysqli_query($conn, "INSERT INTO proveedores (Proveedor, Marca, CantCar, Año, Placas, Poliza) VALUES ('$namePA','$markPA','$cantCPA','$yearCPA','$placasCPA','$polizaCPA')");

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
				window.location.href = "proveedoresA.php";
			</script>'
		;
	}

	//Cerramos la conexion
	mysqli_close($conn);

?>