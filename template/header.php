<?php
session_start();
$usuario = $_SESSION['username'];

?>

<!doctype html>
<html lang="es">
  <head>
    <title>Proyecto Financiero</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  </head>
  <body>
      <div class="">
          <div class="">
              <div class="">
                    <!-- Navbar content -->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">IS - 301</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="usuario.php">Usuarios</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="ingresos.php">Ingresos</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="egresos.php">Egresos</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Reporte</a>
                                </li>
                                
                            </ul>
                            <span class="navbar-text">
                                <?php echo $usuario; ?> [<a href="login/salir.php">salir</a>]
                            </span>
                            </div>
                        </div>
                        </nav>
              </div>
          </div>
      </div>