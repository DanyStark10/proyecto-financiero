<?php include 'template/header.php' ?>

<?php
    include_once "model/db.php";
    $sentencia = $bd -> query("select * from usuario");
    $usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($usuario);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Lista de Usuarios
                </div>
                <div class="p-4">
                    <table class="table aling-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Tipo</th>
                                
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                foreach($usuario as $dato){
                            ?>

                            <tr>
                                <td scope="row"> <?php echo $dato->id_usuario; ?> </td>
                                <td> <?php echo $dato->nombre; ?> </td>
                                <td> <?php echo $dato->correo; ?> </td>
                                <td> <?php echo $dato->tipo_usuario; ?> </td>
                                <td class="text-success"><a href="usuario/editarUsuario.php?id=<?php echo $dato->id_usuario; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td class="text-success"><a href="usuario/editarUsuario.php?id=<?php echo $dato->id_usuario; ?>"><i class="bi bi-trash3"></i></a></td>


                            </tr>

                            <?php 
                                }
                            ?>


                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Alertas -->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>    
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Debe rellenar todos los campos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
                }
            ?> 
            
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>    
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Listo!</strong> Se agregó correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
                }
            ?>  

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>    
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Listo!</strong> Los datos fueron actualizados.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
                }
            ?>
            
            

            <div class="card">
                <div class="card-header">
                    Ingresar datos
                </div>
                <form action="registrarUsuario.php" class="p-4" method="POST" >
                    <div class="mb-3">
                        <label  class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Correo:</label>
                        <input type="text" class="form-control" name="txtCorreo" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Tipo Usuario:</label>
                        <input type="text" class="form-control" name="txtTipo" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" name="txtPassword" autofocus require>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>