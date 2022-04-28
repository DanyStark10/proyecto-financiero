<?php
print_r($_POST);
    if( empty($_POST["txtTipo"]) || empty($_POST["txtDescripcion"]) || empty($_POST["txtMonto"]) || empty($_POST["txtFecha"])){
        header('Location: ../egresos.php?mensaje=falta');
        exit();
    }

    include_once '../model/db.php';
    $tipo = $_POST["txtTipo"];
    $descripcion = $_POST["txtDescripcion"];
    $comentario = $_POST["txtComentario"];
    $monto = $_POST["txtMonto"];
    $fecha = $_POST["txtFecha"];
    
    $sentencia = $bd->prepare("INSERT INTO egresos(id_tipo_egreso,descripcion,comentario,monto,fecha) VALUES (?,?,?,?,?);");
    $resultado = $sentencia->execute([$tipo,$descripcion,$comentario,$monto,$fecha]);

    if ($resultado === TRUE) {
        header('Location: ../egresos.php?mensaje=registrado');
    } else {
       // header('Location: index.php?mensaje=error');
       echo 'error' ;
        exit();
    }
?>