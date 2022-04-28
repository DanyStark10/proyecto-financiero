<?php include '../template/header.php' ?>

<?php
    if(!isset($_GET['id'])){
        header('Location: egresos/editarEgreso.php?mensaje=error');
        exit();
    }

    include_once '../model/db.php';
    $codigo = $_GET['id'];

    $sentencia = $bd->prepare("select * from egresos where id_egreso = ?;");
    $sentencia->execute([$codigo]);
    $egreso = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="procesoEditar.php">
                    <div class="mb-3">
                        <label  class="form-label">Tipo:</label>
                        <input type="text" class="form-control" name="txtTipo" autofocus require
                        value="<?php echo $egreso->id_tipo_egreso; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Descripción:</label>
                        <input type="text" class="form-control" name="txtDescripcion" autofocus require
                        value="<?php echo $egreso->descripcion; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Comentario:</label>
                        <input type="text" class="form-control" name="txtComentario" autofocus require
                        value="<?php echo $egreso->comentario; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Monto:</label>
                        <input type="text" class="form-control" name="txtMonto" autofocus require
                        value="<?php echo $egreso->monto; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Fecha:</label>
                        <input type="text" class="form-control" name="txtFecha" autofocus require
                        value="<?php echo $egreso->fecha; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $egreso->id_egreso; ?>">
                        <input type="submit" class="btn btn-primary" value="Terminar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php' ?>