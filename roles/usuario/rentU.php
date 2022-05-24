<?php
	// PARA INSERTAR DATOS
	
	// Conexion a la BD
	$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	// Recibimos los datos que se enviaron desde el FORM
	$marca = $_POST['carselect'];
	$name = $_POST['nombre'];
	$cant = $_POST['ccarros'];
	$tel = $_POST['telefono'];
    $tipo_car = $_POST['tcar'];
	$resi = $_POST['direccion'];
	$f_retiro = $_POST['fretiro'];
	$f_devo = $_POST['fdevolucion'];
	
	/*$numt = $_POST['num_card'];
	$titular = $_POST['titular'];
	$f_venc = $_POST['fvenc'];
	$code = $_POST['codseg'];*/

	//Calculamos el precio a pagar
	$total = $price * $cant;

	// PREPARAMOS LA SENTENCIA
	$insert = "INSERT INTO alquiler (Marca, Fullname, CantCar, Tel, TipoCar, Residencia, Fecha_ret, Fecha_dev, MOT_ID, Estado, Total_pago) VALUES ('$marca', '$name', '$cant', '$tel', '$tipo_car','$resi', '$f_retiro', '$f_devo', '$numt', '$titular', '$f_venc', '$code')";

	// Ejecutamos la consulta
	$res = mysqli_query($conn, $insert);
	if (!$res) {
		echo '<script type="text/javascript">
		alert("Error al registrar");
		location.reload();
		</script>';
	} else {
		echo '<script type="text/javascript">
		alert("Datos insertados correctamente!");
		window.location.href = "index_user.php";
		</script>';
	}

	// Cerramos la conexion
	mysqli_close($conn);
?>