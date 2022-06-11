<?php include 'template/header.php' ?>

<?php
    include_once "model/db.php";

    $usuario = $_SESSION['username'];
    $rol = $_SESSION['rol'];
    $escuela = $_SESSION['escuela'];

    $sentencia = $bd -> query("select * from ingresos");
    $ingreso = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($usuario);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <!-- <div class="card"> 
                <div class="card-header">
                    Filtrar por:
                </div> -->
               <!-- <form action="ingresos.php"> -->
                    <!-- Filtro por dia 
                    <div class="row g-3">
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">Dia: </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <input type="text"  name="txtDia" placeholder="yyyy-mm-dd">
                        </div>
                    </div>  -->

                    <!-- Filtro por mes 
                    <div class="row g-3">
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">Mes: </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <input type="text"  name="txtMes" placeholder="mm">
                        </div>
                        <div class="col-auto">
                            <label class="form-check-label" for="flexRadioDefault1"> del Año  </label>
                        </div>
                        <div class="col-auto">
                            <input type="text"  name="txtMesYear" placeholder="yyyy">
                        </div> 
                    </div>  -->

                    <!-- Filtro por rango de fechas
                    <div class="row g-3">
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">Del dia : </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <input type="text"  name="txtInicio" placeholder="yyyy-mm-dd">
                        </div>
                        <div class="col-auto">
                            <label class="form-check-label" for="flexRadioDefault1"> hasta  </label>
                        </div>
                        <div class="col-auto">
                            <input type="text"  name="txtFin" placeholder="yyyy-mm-dd">
                        </div> 
                    </div>
                     -->
                    <!-- Filtro por año 
                    <div class="row g-3">
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">Año: </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <input type="text"  name="txtYear" placeholder="yyyy">
                        </div>
                    </div>
                </form>
                -->
            <!--</div> --> 
            <div class="card">
                <div class="card-header">
                    Lista de Ingresos registrados
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
                                foreach($ingreso as $dato){
                            ?>

                            <tr>
                                <td scope="row"> <?php echo $dato->id_ingreso; ?> </td>
                                <td> <?php echo $dato->id_tipo_ingreso; ?> </td>
                                <td> <?php echo $dato->descripcion; ?> </td>
                                <td> <?php echo $dato->comentario; ?> </td>
                                <td> <?php echo $dato->monto; ?> </td>
                                <td> <?php echo $dato->fecha; ?> </td>
                                <td class="text-success"><a href="ingresos/editarIngreso.php?id=<?php echo $dato->id_ingreso; ?>"><i class="bi bi-pencil-square"></i></a></td>


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
            
            

            <div class="card">
                <div class="card-header">
                    Registrar nuevos ingresos
                </div>
                <form action="ingresos/registrarIngreso.php" class="p-4" method="POST" >
                    <div class="mb-3">
                        <label  class="form-label">Tipo:</label>
                        <select name="txtTipo"  class="form-control">
                        <?php
                            include_once "model/db.php";
                            $sentencia = $bd -> query("SELECT * FROM tipo_ingresos;");
                            $usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
                            //print_r($usuario);
                            foreach($usuario as $dato){;
                                ?>
                                    <option value="<?php echo $dato->id_tipo_ingreso; ?>"><?php echo $dato->descripcion ?></option>
                                <?php
                            }

                        ?>
                        </select>                    
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
                        <label  class="form-label">Escuela:</label>
                        <select name="txtEscuela"  class="form-control">
                        <?php
                            include_once "model/db.php";

                            if($rol == '1'){
                                $sentencia = $bd -> query("SELECT * FROM escuela;");
                            }else{
                                $sentencia = $bd -> query("SELECT * FROM escuela where id_escuela = $escuela;");
                            }

                            
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