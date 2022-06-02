<?php
    print_r($_GET);
    if(!isset($_GET['id'])){
        header('Location: ../usuario.php?mensaje=error');
    }

    include '../model/db.php';
    $id = $_GET['id'];


    $sentencia = $bd->prepare("UPDATE usuario SET estado = '2' where id_usuario = ?;");
    $resultado = $sentencia->execute([$id]);

    if ($resultado === TRUE) {
        header('Location: ../usuario.php?mensaje=baja');
    } else {
        header('Location: ../usuario.php?mensaje=error');
        exit();
    }
    
?>