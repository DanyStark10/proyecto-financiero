<?php include 'template/header.php' ?>

<?php
    include_once "model/db.php";
    $sentencia = $bd -> query("select * from escuela");
    $egreso = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($usuario);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista de Escuelas registradas registrados
                </div>
                <div class="p-4">
                    <table class="table aling-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Clave</th>
                                <th scope="col">Turno</th>
                                <th scope="col">Zona</th>
                                <th scope="col">Sector</th>
                                <th scope="col">Domicilio</th>
                                <th scope="col">Localidad</th>
                                <th scope="col">Telefono</th>
                                
                                <th scope="col" >Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                foreach($egreso as $dato){
                            ?>

                            <tr>
                                <td scope="row"> <?php echo $dato->id_escuela; ?> </td>
                                <td> <?php echo $dato->nombre; ?> </td>
                                <td> <?php echo $dato->clave; ?> </td>
                                <td> <?php echo $dato->tipo_turno; ?> </td>
                                <td> <?php echo $dato->zona; ?> </td>
                                <td> <?php echo $dato->sector; ?> </td>
                                <td> <?php echo $dato->domicilio; ?> </td>
                                <td> <?php echo $dato->localidad; ?> </td>
                                <td> <?php echo $dato->telefono; ?> </td>
                                <td class="text-success"><a href="escuelas/editarEscuela.php?id=<?php echo $dato->id_escuela; ?>"><i class="bi bi-pencil-square"></i></a></td>


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
            
            


        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
            <div class="card">
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
                <div class="card-header">
                    Registrar nueva Escuela
                </div>
                <form action="escuelas/registrarEscuela.php" class="p-4" method="POST" >
                    <div class="mb-3">
                        <label  class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Clave:</label>
                        <input type="text" class="form-control" name="txtClave" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">tipo turno:</label>
                        <select name="txtTurno"  class="form-control">
                        <?php
                            include_once "model/db.php";
                            $sentencia = $bd -> query("SELECT * FROM tipo_turno;");
                            $usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
                            //print_r($usuario);
                            foreach($usuario as $dato){;
                                ?>
                                    <option value="<?php echo $dato->id ?>"><?php echo $dato->nombre; ?></option>
                                <?php
                            }

                        ?>
                        </select>   
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Zona:</label>
                        <input type="text" class="form-control" name="txtZona" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Sector:</label>
                        <input type="text" class="form-control" name="txtSector" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Domicilio:</label>
                        <input type="text" class="form-control" name="txtDomicilio" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Localidad:</label>
                        <input type="text" class="form-control" name="txtLocalidad" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Telefono:</label>
                        <input type="text" class="form-control" name="txtTelefono" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Cantidad de Padres:</label>
                        <input type="text" class="form-control" name="txtCantPadres" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Cuota Padres:</label>
                        <input type="text" class="form-control" name="txtCuota" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Cantidad Alumnos:</label>
                        <input type="text" class="form-control" name="txtAlumnos" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Cantidad Grupos:</label>
                        <input type="text" class="form-control" name="txtGrupos" autofocus require>
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>


<?php include 'template/footer.php' ?>