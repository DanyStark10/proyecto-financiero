<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: ../egresos.php?mensaje=error');
    }

    include '../model/db.php';
    $id = $_POST['codigo'];
    $tipo = $_POST['txtTipo'];
    $descripcion = $_POST['txtDescripcion'];
    $comentario = $_POST['txtComentario'];
    $monto = $_POST['txtMonto'];
    $fecha = $_POST['txtFecha'];

    $sentencia = $bd->prepare("UPDATE egresos SET id_tipo_egreso = ?, descripcion = ?, comentario = ?, monto = ?, fecha = ? where id_egreso = ?;");
    $resultado = $sentencia->execute([$tipo, $descripcion, $comentario, $monto, $fecha, $id]);

    if ($resultado === TRUE) {
        header('Location: ../egresos.php?mensaje=editado');
    } else {
        header('Location: ../egresos.php?mensaje=error');
        exit();
    }
    
?>