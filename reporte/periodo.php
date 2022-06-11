<?php include '../template/header.php' ?>

<?php
$usuario = $_SESSION['username'];
$rol = $_SESSION['rol'];
$escuela = $_SESSION['escuela'];

    include_once "../model/db.php";
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
                    Ingresa las fechas 
                </div>
                <form action="MostarReporte.php?escuela=<?php echo $_GET['escuela']  ?>" class="p-4" method="POST" >
                    <div class="mb-3">
                        <label  class="form-label">Fecha de Inicio:</label>
                        <input type="text" class="form-control" name="txtInicio" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Fecha Final:</label>
                        <input type="text" class="form-control" name="txtFinal" autofocus require>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="txtPeriodo" value="4">
                        <input type="hidden" name="txtEscuela" value="<?php echo $_GET['escuela']?>">
                        <input type="submit" class="btn btn-primary" value="Ver Reporte">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php' ?>