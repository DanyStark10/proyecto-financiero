<!doctype html>
<html lang="en">
  <head>
    <title>login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="container mt-5">
          <div class="row justify-content-center">
              <div class="col-md-5">
                <div class="card">

                    <!-- ALERTAS -->

                <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
                ?>    
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Sus credenciales son incorrectas.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php
                    }
                ?> 

                <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'inicio'){
                ?>    
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Debe iniciar sesioón para ingresar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php
                    }
                ?> 

                    <div class="card-header">
                        Iniciar Sesión
                    </div>
                    <form action="login/loguear.php" class="p-4" method="POST" >
                        <div class="mb-3">
                            <label  class="form-label">Correo:</label>
                            <input type="email" class="form-control" name="txtCorreo" autofocus require>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" name="txtPassword" autofocus require>
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>
                    </form>
                </div> 
              </div>
          </div>
      </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>