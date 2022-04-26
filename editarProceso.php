<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/db.php';
    $id = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $correo = $_POST['txtCorreo'];
    $tipo_usuario = $_POST['txtTipo'];

    $sentencia = $bd->prepare("UPDATE usuario SET nombre = ?, correo = ?, tipo_usuario = ? where id_usuario = ?;");
    $resultado = $sentencia->execute([$nombre, $correo, $tipo_usuario, $id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>