<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
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
	$nameMot = $_POST['motorista'];
	$state = $_POST['state'];
	$entrega = $_POST['entregaAlq'];
	$price = $_POST['precio'];

	//Calculamos el precio a pagar
	//$total = $price * $cant;

	// PREPARAMOS LA SENTENCIA
	$insert = "INSERT INTO alquiler (Marca, Fullname, CantCar, Tel, TipoCar, Residencia, Fecha_ret, Fecha_dev, Name_mot, Estado, Entrega, Total_pago) VALUES ('$marca', '$name', '$cant', '$tel', '$tipo_car','$resi', '$f_retiro', '$f_devo', '$nameMot', '$state', '$entrega', '$price')";

	// Ejecutamos la consulta
	$res = mysqli_query($conn, $insert);
	if (!$res) {
		echo '<script type="text/javascript">
			alert("Error al registrar");
			location.reload();
			</script>'
		;
	} else {
		echo '<script type="text/javascript">
				alert("Datos registrados correctamente, revise sus reservas!");
				window.location.href = "index_user.php";
			</script>'
		;
	}

	// Cerramos la conexion
	mysqli_close($conn);
?>