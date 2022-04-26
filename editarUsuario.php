<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/db.php';
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
                        <input type="text" class="form-control" name="txtTipo" autofocus required
                        value="<?php echo $usuario->tipo_usuario; ?>">
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

<?php include 'template/footer.php' ?>