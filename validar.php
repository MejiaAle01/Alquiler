<?php
	//Iniciamos la sesion segun el perfil de usuario
	session_start();

	//Conexion a la base de datos
	$conexion = mysqli_connect("localhost", "root", "", "alquiler");

	//Obtenemos los campos del lado del servidor con los enviados por el metodo POST del formulario.
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		//Validamos los campos
		if (isset($_POST["usuario"]) && isset($_POST["contra"])) {
			$user = $_POST["usuario"];
			$pass = $_POST["contra"];

			//Verificamos los datos

			//Hacemos la consulta
			$sql = "SELECT * FROM usurio WHERE Usuario = '$user' AND Contraseña = '$pass'";
			$result = mysqli_query($conexion, $sql);
			/*Verificamos las filas en donde puede estar almacenado el usuario
			Obtenemos el num de fila y lo pasamos a la sesion segun el usuario digitado en el formulario y el usuario registrado en la BD*/
			if ($result->num_rows > 0) {
				$rowData = mysqli_fetch_assoc($result);
				$_SESSION['usuario'] = $rowData['Usuario'];

				/*Con ayuda de JavaScript redireccionamos a la pagina principal y mostramos un mensaje de alerta.*/
				echo 
					'<script type="text/javascript">
						alert("Iniciando sesion...");
						window.location.href = "index_admin.php";
					</script>'
				;
			} else {
				/*En caso contrario recarga la pagina si encuentra diferentes datos y muestra un mensaje de error.*/
				echo 
					'<script type="text/javascript">
						alert("Usuario o contraseña incorrectos!");
						window.history.go(-1);
					</script>'
				;
			}
		}
	}

	//Cerramos la conexion
	mysqli_close($conexion);
?>