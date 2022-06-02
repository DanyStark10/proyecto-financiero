<?php
print_r($_POST);
    if( empty($_POST["txtNombre"]) || empty($_POST["txtClave"]) || empty($_POST["txtTurno"]) || 
       empty($_POST["txtZona"]) ||  empty($_POST["txtSector"]) || empty($_POST["txtDomicilio"]) ||  empty($_POST["txtLocalidad"]) ||
        empty($_POST["txtTelefono"]) ||  empty($_POST["txtCantPadres"]) ||  empty($_POST["txtCuota"]) ||  empty($_POST["txtAlumnos"]) ||
        empty($_POST["txtGrupos"])){
        header('Location: ../escuelas.php?mensaje=falta');
        exit();
    }

    include_once '../model/db.php';
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

    $sentencia = $bd->prepare("INSERT INTO escuela(nombre,clave,tipo_turno,zona,sector,domicilio,localidad,telefono,cant_padres,cuota_padres,cant_alumnos,cant_grupos) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$clave,$turno,$zona,$sector,$domicilio,$localidad,$telefono,$padres,$cuota,$alumnos,$grupos]);

    if ($resultado === TRUE) {
        header('Location: ../escuelas.php?mensaje=registrado');
    } else {
       // header('Location: index.php?mensaje=error');
       echo 'error' ;
        exit();
    }
?>