<?php include 'template/header.php' ?>

<?php
    include_once "model/db.php";
    $sentencia = $bd -> query("select * from egresos");
    $egreso = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($usuario);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Lista de Egresos registrados
                </div>
                <div class="p-4">
                    <table class="table aling-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Comentario</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Fecha</th>
                                
                                <th scope="col" >Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                foreach($egreso as $dato){
                            ?>

                            <tr>
                                <td scope="row"> <?php echo $dato->id_egreso; ?> </td>
                                <td> <?php echo $dato->id_tipo_egreso; ?> </td>
                                <td> <?php echo $dato->descripcion; ?> </td>
                                <td> <?php echo $dato->comentario; ?> </td>
                                <td> <?php echo $dato->monto; ?> </td>
                                <td> <?php echo $dato->fecha; ?> </td>
                                <td class="text-success"><a href="egresos/editarEgreso.php?id=<?php echo $dato->id_egreso; ?>"><i class="bi bi-pencil-square"></i></a></td>


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
                    Registrar nuevos Egresos
                </div>
                <form action="egresos/registrarEgreso.php" class="p-4" method="POST" >
                    <div class="mb-3">
                        <label  class="form-label">Tipo:</label>
                        <input type="text" class="form-control" name="txtTipo" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Descripción:</label>
                        <input type="text" class="form-control" name="txtDescripcion" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Comentario:</label>
                        <input type="text" class="form-control" name="txtComentario" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Monto:</label>
                        <input type="text" class="form-control" name="txtMonto" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">ID Escuela:</label>
                        <input type="text" class="form-control" name="txtEscuela" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Fecha:</label>
                        <input type="text" class="form-control" name="txtFecha" autofocus require>
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>