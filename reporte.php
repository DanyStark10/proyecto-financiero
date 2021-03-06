<?php include 'template/header.php' ?>

<?php
$usuario = $_SESSION['username'];
$rol = $_SESSION['rol'];
$escuela = $_SESSION['escuela'];

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
                <form action="reporte/MostarReporte.php?escuela=<?php echo $escuela ?>" class="p-4" method="POST" >

                    <?php 
                        if($rol == '1'){
                            ?>
                                <div class="mb-3">
                                <label  class="form-label">Escuela:</label>
                                <select name="txtID"  class="form-control">
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
                            <?php
                        }else{
                                
                        }
                    
                    ?>
                    <div class="mb-3">
                        <label  class="form-label">Periodo:</label>
                        <select name="txtPeriodo"  class="form-control">
                            <option value="1">Primer periodo (Enero-Junio)</option>
                            <option value="2">Segundo periodo (Julio-Diciembre)</option>
                            <option value="3">Personalizado</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="txtEscuela" value="1">
                        <input type="submit" class="btn btn-primary" value="Ver Reporte">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>