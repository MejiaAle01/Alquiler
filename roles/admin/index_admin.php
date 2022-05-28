<?php
  //Iniciamos la sesion segun el perfil del usuario
  session_start();

  //Valida el usuario y su rol que tiene de ser diferente redirecciona a la pagina segun su rol
  if (!isset($_SESSION['usuario']) && !isset($_SESSION['tipousuario'])) {
    header('location: ../../login/login.php');
  } else {
    if ($_SESSION['tipousuario'] != 'Administrador') {
      header("location: ../../login/login.php");
    }
  }
?>

<!-- Plantilla base de Bootstrap -->
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title> Pagina principal admins </title>
    <!-- Enlace a los estilos de Bootstrap -->
    <link rel="stylesheet" href="../../assets/css/styleadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Enlace a la libreria de iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <!-- Hacemos uso de etiquetas header y nav para hacer la barra de navegacion -->
    <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <!-- Etiquetas de contenedor que contendran al nav de nuestra pag -->
        <div class="container-fluid">
          <!-- Boton que aparecera al visitar la pagina desde una pantalla diferente -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <!-- Icono del boton que aparecera al ser pantalla responsiva -->
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Contenedor de la barra de navegacion -->
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <img src="https://img.icons8.com/color/48/000000/traffic-jam.png" alt="Logo" width="30">
            </ul>

            <!-- Boton que se muestra al final de la barra de navegacion -->
            <span class="navbar-text">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <!-- Boton que obtendra por medio de PHP el nombre de usuario -->
                  <button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-bs-toggle="dropdown" data-bd-display="static" data-bs-display="static" aria-expanded="false">
                    <i class="bi-person-circle"></i>
                  </button>
                  <!-- Menu que se obtendra al presionar sobre nuestro nombre de usuario -->
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li class="text-center"><?php echo $_SESSION['usuario']; ?><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-center" href="../../login/cerrar_sesion.php"> Cerrar sesión </a></li>
                  </ul>
                </li>
              </ul>
            </span>
          </div>
        </div>
      </nav>
    </header>

    <!-- Creamos el contenido principal de la pagina -->
    <main>
      <section class="py-5">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-4 g-4">
            <div class="col">
              <div class="card border-dark bg-transparent">
                <a class="btn btn-outline-dark fs-4 fw-bold text-white" href="historial/reservasA.php">
                  <i class="bi-book" style="font-size: 8rem;">
                    <br>
                  </i>
                  Registros
                </a>
              </div>
            </div>
            <div class="col">
              <div class="card border-dark bg-transparent">
                <a class="btn btn-outline-dark fs-4 fw-bold text-white" href="gUser.php">
                  <i class="bi-person" style="font-size: 8rem;">
                    <br>
                  </i>
                  Usuarios
                </a>
              </div>
            </div>
            <div class="col">
              <div class="card border-dark bg-transparent">
                <a class="btn btn-outline-dark fs-4 fw-bold text-white" href="proveedores/proveedoresA.php">
                  <i class="bi-person-lines-fill" style="font-size: 8rem;">
                    <br>
                  </i>
                  Proveedores
                </a>
              </div>
            </div>
            <div class="col">
              <div class="card border-dark bg-transparent">
                <a class="btn btn-outline-dark fs-4 fw-bold text-white" href="motoristas/motoristasA.php">
                  <i class="bi bi-file-earmark-person" style="font-size: 8rem;">
                    <br>
                  </i>
                  Motoristas
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Libreria de JavaScript que necesita bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>