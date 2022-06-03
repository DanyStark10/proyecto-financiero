<?php include '../template/header.php' ?>

<?php
    if(!isset($_GET['id'])){
        header('Location: editarUsuario.php?mensaje=error');
        exit();
    }

    include_once '../model/db.php';
    $codigo = $_GET['id'];

    $sentencia = $bd->prepare("select * from usuario where id_usuario = ?;");
    $sentencia->execute([$codigo]);
    $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $usuario->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo: </label>
                        <input type="text" class="form-control" name="txtCorreo" autofocus required
                        value="<?php echo $usuario->correo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo: </label>
                        <select name="txtTipo"  class="form-control">
                        <?php
                            include_once "model/db.php";
                            $sentencia = $bd -> query("SELECT * FROM tipo_usuario;");
                            $user = $sentencia->fetchAll(PDO::FETCH_OBJ);
                            //print_r($usuario);
                            foreach($user as $dato){;
                                ?>
                                    <option value="<?php echo $dato->id_tipo; ?>"
                                    <?php 
                                            if($dato->id_tipo == $usuario->tipo_usuario){
                                                ?>
                                                    selected = "true"
                                                <?php
                                            }
                                        ?>
                                    ><?php echo $dato->nombre ?></option>
                                <?php
                            }

                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Escuela:</label>
                        <select name="txtEscuela" class="form-control">
                        <?php
                            include_once "model/db.php";
                            $sentencia = $bd -> query("SELECT * FROM escuela;");
                            $user = $sentencia->fetchAll(PDO::FETCH_OBJ);
                            //print_r($usuario);
                            foreach($user as $dato){;
                                ?>
                                    <option value="<?php echo $dato->id_escuela; ?>"
                                        <?php 
                                            if($dato->id_escuela == $usuario->id_escuela){
                                                ?>
                                                    selected = "true"
                                                <?php
                                            }
                                        ?>
                                    ><?php echo $dato->nombre ?></option>
                                <?php
                            }

                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña: </label>
                        <input type="text" class="form-control" name="txtPassword" autofocus required
                        value="<?php echo $usuario->password; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $usuario->id_usuario; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php' ?>