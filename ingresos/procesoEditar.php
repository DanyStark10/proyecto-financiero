<?php
    //print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: ../ingresos.php?mensaje=error');
    }

    include '../model/db.php';
    $id = $_POST['codigo'];
    $tipo = $_POST['txtTipo'];
    $descripcion = $_POST['txtDescripcion'];
    $comentario = $_POST['txtComentario'];
    $monto = $_POST['txtMonto'];
    $fecha = $_POST['txtFecha'];
    $escuela = $_POST['txtEscuela'];

    $sentencia = $bd->prepare("UPDATE ingresos SET id_tipo_ingreso = ?, descripcion = ?, comentario = ?, monto = ?, fecha = ?, id_escuela = ? where id_ingreso = ?;");
    $resultado = $sentencia->execute([$tipo, $descripcion, $comentario, $monto, $fecha,$escuela, $id]);

    if ($resultado === TRUE) {
        header('Location: ../ingresos.php?mensaje=editado');
    } else {
        header('Location: ../ingresos.php?mensaje=error');
        exit();
    }
    
?>