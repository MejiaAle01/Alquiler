<?php
  //Iniciamos la sesion segun el perfil del usuario
  session_start();

  //Valida el usuario y su rol que tiene de ser diferente redirecciona a la pagina segun su rol
  if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
    /*if ($_SESSION['usuario']['tipousuario'] == "Usuario") {
      header("location: index_user.php");
    }*/
  }

?>

<!-- Template base de bootstrap -->
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title> Pagina Principal Admin </title>
    <!-- Estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <!-- Hacemos uso de el navbar que viene en bootstrap para hacer la barra de navegacion -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <!-- Contenedor de bootstap -->
      <div class="container-fluid">
        <!-- Boton que aparecera al visitar la pagina desde una dimension de pantalla diferente -->
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <!-- Icono del boton que aparecera -->
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenedor que obtendra la barra de navegacion -->
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <!-- Etiqueta a que redireccionara a la pagina de inicio -->
              <a class="nav-link active" aria-current="page" href="#"> Inicio </a>
            </li>
            <li class="nav-item">
              <!--Etiqueta que redireccionara a la pagina de proveedores -->
              <a class="nav-link" href="#"> Proveedores </a>
            </li>
          </ul>
          <!-- Boton que se muestra al final de la barra de navegacion -->
          <span class="navbar-text">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <!-- Boton que obtendra por medio de PHP el nombre de usuario -->
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bd-display="static" aria-expanded="false"><?php echo $_SESSION['usuario']; ?></button>
                <!-- Menu que se obtendra al presionar sobre nuestro nombre de usuario -->
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <!-- Enlace que redirecciona a los registros (ADMIN) -->
                  <li><a class="dropdown-item" href="crudusuarios/index.html"> Ver registros </a></li>
                  <!-- Enlace que redirecciona al archivo cerrar sesion.php -->
                  <li><a class="dropdown-item" href="cerrar_sesion.php"> Cerrar Sesion </a></li>
                </ul>
              </li>
            </ul>
          </span>
        </div>
      </div>
    </nav>

    <!-- PERSONALIZAR SEGUN EL GUSTO -->

    <h1> </h1>

    <!-- Libreria de JavaScript que necesita bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>