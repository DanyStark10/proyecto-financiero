<?php
    //print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: ../escuelas.php?mensaje=error');
    }

    include '../model/db.php';
    $id = $_POST['codigo'];
    $nombre = $_POST["txtNombre"];
    $clave = $_POST["txtClave"];
    $turno = $_POST["txtTurno"];
    $zona = $_POST["txtZona"];
    $sector = $_POST["txtSector"];
    $domicilio = $_POST["txtDomicilio"];
    $localidad = $_POST["txtLocalidad"];
    $telefono = $_POST["txtTelefono"];
    $padres = $_POST["txtCantPadres"];
    $cuota = $_POST["txtCuota"];
    $alumnos = $_POST["txtAlumnos"];
    $grupos = $_POST["txtGrupos"];

    $sentencia = $bd->prepare("UPDATE escuela SET nombre = ?, clave = ?, tipo_turno = ?, zona = ?, sector = ?, domicilio = ?, localidad = ?, telefono = ?, cant_padres = ?, cuota_padres = ?, cant_alumnos = ?, cant_grupos = ? where id_escuela = ?;");
    $resultado = $sentencia->execute([$nombre,$clave,$turno,$zona,$sector,$domicilio,$localidad,$telefono,$padres,$cuota,$alumnos,$grupos, $id]);

    if ($resultado === TRUE) {
        header('Location: ../escuelas.php?mensaje=editado');
    } else {
        header('Location: ../escuelas.php?mensaje=error');
        exit();
    }
    
?>