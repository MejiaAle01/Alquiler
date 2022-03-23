<?php
	//Iniciamos la sesion segun el perfil de usuario
	session_start();

	//Conexion a la base de datos
	$conexion = mysqli_connect("localhost", "root", "", "alquiler");

	//Comparamos los campos que se envian del servidor con el metodo POST del formulario
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		//Validamos los campos
		if (isset($_POST["usuario"]) && isset($_POST["contra"])) {
			$user = $_POST["usuario"];
			$pass = $_POST["contra"];

			//Verificamos los datos

			//Hacemos la consulta
			$sql = "SELECT * FROM usurio WHERE Usuario = '$user' AND Contraseña = '$pass'";
			$result = mysqli_query($conexion, $sql);
			//Verificamos las filas en donde puede estar almacenado
			if ($result->num_rows > 0) {
				$rowData = mysqli_fetch_assoc($result);
				$_SESSION['usuario'] = $rowData['Usuario'];

				//Con este comando redireccionamos a la pagina principal
				echo 
					'<script type="text/javascript">
						alert("Iniciando sesion...");
						window.location.href = "index_admin.php";
					</script>'
				;
				//En caso contrario
			} else {
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