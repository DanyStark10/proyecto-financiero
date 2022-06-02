<?php include '../template/header.php' ?>

<?php
    if(!isset($_GET['id'])){
        header('Location: escuela/editarEscuela.php?mensaje=error');
        exit();
    }

    include_once '../model/db.php';
    $codigo = $_GET['id'];

    $sentencia = $bd->prepare("select * from escuela where id_escuela = ?;");
    $sentencia->execute([$codigo]);
    $ingreso = $sentencia->fetch(PDO::FETCH_OBJ);
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
                        <label  class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus require
                        value="<?php echo $ingreso->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Clave:</label>
                        <input type="text" class="form-control" name="txtClave" autofocus require
                        value="<?php echo $ingreso->clave; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Tipo Turno:</label>
                        <input type="text" class="form-control" name="txtTurno" autofocus require
                        value="<?php echo $ingreso->tipo_turno; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Zona:</label>
                        <input type="text" class="form-control" name="txtZona" autofocus require
                        value="<?php echo $ingreso->zona; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Sector:</label>
                        <input type="text" class="form-control" name="txtSector" autofocus require
                        value="<?php echo $ingreso->sector; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Domicilio:</label>
                        <input type="text" class="form-control" name="txtDomicilio" autofocus require
                        value="<?php echo $ingreso->domicilio; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Localidad:</label>
                        <input type="text" class="form-control" name="txtLocalidad" autofocus require
                        value="<?php echo $ingreso->localidad; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Telefono:</label>
                        <input type="text" class="form-control" name="txtTelefono" autofocus require
                        value="<?php echo $ingreso->telefono; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Cantidad de Padres:</label>
                        <input type="text" class="form-control" name="txtCantPadres" autofocus require
                        value="<?php echo $ingreso->cant_padres; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Cuota padres de familia:</label>
                        <input type="text" class="form-control" name="txtCuota" autofocus require
                        value="<?php echo $ingreso->cuota_padres; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Cantidad Alumnos:</label>
                        <input type="text" class="form-control" name="txtAlumnos" autofocus require
                        value="<?php echo $ingreso->cant_alumnos; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Cantidad de Grupos:</label>
                        <input type="text" class="form-control" name="txtGrupos" autofocus require
                        value="<?php echo $ingreso->cant_grupos; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $ingreso->id_escuela; ?>">
                        <input type="submit" class="btn btn-primary" value="Terminar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php' ?>