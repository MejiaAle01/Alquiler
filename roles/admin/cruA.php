<?php
	// Conexion a la BD
	$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

	// Recibimos los datos que se enviaron desde el FORM
	$user = $_POST['usuario'];
	$pass = $_POST['contra'];
	$name = $_POST['nombre'];
	$ape = $_POST['apellido'];
	$email = $_POST['correo'];
	$roluser = $_POST['tipousuario'];

	//Generamos un hash para la contraseña
	$pwd_hash = password_hash($pass, PASSWORD_DEFAULT);

	// Ingresamos los datos
	$insert = "INSERT INTO usuarios (Usuario, Contraseña, Nombre, Apellido, Correo, T_user) VALUES ('$user', '$pwd_hash', '$name', '$ape', '$email', '$roluser')";

	// Verificamos si el usuario existe
	$verificaruser = mysqli_query($conn, "SELECT * FROM usuarios WHERE Usuario = '$user'");
	if (mysqli_num_rows($verificaruser) > 0) {
		echo '<script type="text/javascript">
		alert("El usuario ya existe");
		window.history.go(-1);
		</script>';
		exit;
	}

	// Verificamos si el correo existe
	$verificarcorreo = mysqli_query($conn, "SELECT * FROM usuarios WHERE Correo = '$email'");
	if (mysqli_num_rows($verificarcorreo) > 0) {
		echo '<script type="text/javascript">
		alert("El correo ya existe");
		window.history.go(-1);
		</script>';
		exit;
	}

	// Verificamos si la contraseña existe
	$verificarcontra = mysqli_query($conn, "SELECT * FROM usuarios WHERE Contraseña = '$pass'");
	if (mysqli_num_rows($verificarcontra) > 0) {
		echo '<script type="text/javascript">
		alert("La contraseña ya existe");
		window.history.go(-1);
		</script>';
		exit;
	}

	// Ejecutamos la consulta
	$resultado = mysqli_query($conn, $insert);
	if (!$resultado) {
		echo '<script type="text/javascript">
		alert("Error al registrar usuario");
		location.reload();
		</script>';
	} else {
		echo '<script type="text/javascript">
		alert("Usuario registrado correctamente");
		window.location.href = "gUser.php";
		</script>';
	}

	// Cerramos la conexion
	mysqli_close($conn);
?>