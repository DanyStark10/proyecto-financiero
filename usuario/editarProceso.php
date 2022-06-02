<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: ../usuario.php?mensaje=error');
    }

    include '../model/db.php';
    $id = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $correo = $_POST['txtCorreo'];
    $tipo_usuario = $_POST['txtTipo'];
    $password = $_POST['txtPassword'];
    $escuela = $_POST['txtEscuela'];

    $sentencia = $bd->prepare("UPDATE usuario SET nombre = ?, correo = ?, tipo_usuario = ?, password = ?, id_escuela = ? where id_usuario = ?;");
    $resultado = $sentencia->execute([$nombre, $correo, $tipo_usuario, $password,$escuela, $id]);

    if ($resultado === TRUE) {
        header('Location: ../usuario.php?mensaje=editado');
    } else {
        header('Location: ../usuario.php?mensaje=error');
        exit();
    }
    
?>