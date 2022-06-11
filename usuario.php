<?php include 'template/header.php' ?>

<?php
    include_once "model/db.php";
    $sentencia = $bd -> query("SELECT usuario.id_usuario, usuario.nombre, usuario.correo, tipo_usuario.nombre as tipo_usuario, escuela.nombre as id_escuela FROM usuario
    INNER JOIN tipo_usuario ON usuario.tipo_usuario = tipo_usuario.id_tipo
    INNER JOIN escuela ON usuario.id_escuela = escuela.id_escuela WHERE usuario.estado = '1';");
    $usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($usuario);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                                <th scope="col">Escuela</th>
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
                                <td> <?php echo $dato->id_escuela; ?> </td>
                                <td class="text-success"><a href="usuario/editarUsuario.php?id=<?php echo $dato->id_usuario; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td class="text-success"><a href="usuario/bajaUsuario.php?id=<?php echo $dato->id_usuario; ?>"><i class="bi bi-trash3"></i></a></td>


                            </tr>

                            <?php 
                                }
                            ?>


                        </tbody>
                    </table>
                    
                </div>

                <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>

                    <li class="page-item disabled">
                    <a class="page-link" href="#">Siguiente</a>
                    </li>
                </ul>
                </nav>
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
            
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'baja'){
            ?>    
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Listo!</strong> Baja Correcta.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
                }
            ?>

            <div class="card">
                <div class="card-header">
                    Ingresar datos
                </div>
                <form action="usuario/registrarUsuario.php" class="p-4" method="POST" >
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
                        <select name="tipo"  class="form-control">
                        <?php
                            include_once "model/db.php";
                            $sentencia = $bd -> query("SELECT * FROM tipo_usuario;");
                            $usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
                            //print_r($usuario);
                            foreach($usuario as $dato){;
                                ?>
                                    <option value="<?php echo $dato->id_tipo; ?>"><?php echo $dato->nombre ?></option>
                                <?php
                            }

                        ?>
                        </select>
                        <!--    <input type="text" class="form-control" name="txtTipo" autofocus require> -->
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Escuela:</label>
                        <select name="escuela"  class="form-control">
                        <?php
                            include_once "model/db.php";
                            $sentencia = $bd -> query("SELECT * FROM escuela;");
                            $usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
                            //print_r($usuario);
                            foreach($usuario as $dato){;
                                ?>
                                    <option value="<?php echo $dato->id_escuela; ?>"><?php echo $dato->nombre ?></option>
                                <?php
                            }

                        ?>
                        </select>
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