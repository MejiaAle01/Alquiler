<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title> Registrarse </title>
    <link rel="stylesheet" href="assets/css/estilosregistro.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <div class="contenedor-form2">
      <div class="toggle2">
        <a href="login.php"> Cancelar </a>
      </div>

      <div class="formulario2">
        <h2> Crea tu cuenta </h2>
        <form action="registro_user.php" method="POST">
          <input type="text" placeholder="Nombre" required name="nombre" id="nombre">
          <input type="text" placeholder="Apellido" required name="apellido" id="apellido">
          <input type="text" placeholder="Usuario" required name="usuario" id="usuario">
          <input type="password" placeholder="Contraseña" required name="contra" id="contra">
          <input type="text" placeholder="Correo" required name="correo" id="correo">
          <input type="hidden" placeholder="Rol de Usuario" name="tipousuario" id="tipousuario" value="Usuario">
          <input type="submit" value="Registrarse">
        </form>
      </div>
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
  </body>
</html>