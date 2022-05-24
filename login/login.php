<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title> Iniciar Sesión </title>
		<link rel="stylesheet" href="../assets/css/estilos.css">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<main class="contenedor-form">
			<div class="toggle">
				<a href="registrar.php"> Registrarse </a>
			</div>

			<section class="formulario">
				<h2> Iniciar Sesión </h2>
				<form id="loginForm" action="validar.php" method="POST">
					<input type="text" placeholder="Usuario" name="usuario" id="usuario" required>
					<input type="password" placeholder="Contraseña" name="contra" id="contra" required>
					<select name="tipousuario">
						<option value="Administrador"> Administrador </option>
						<option value="Empleado"> Empleado </option>
						<option value="Usuario"> Usuario </option>
					</select>
					<button type="submit" value="Iniciar Sesión"> Iniciar Sesión </button>
				</form>
			</section>
		</main>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script type="text/javascript" src="../assets/js/jquery-ui.min.js"></script>
	</body>
</html>