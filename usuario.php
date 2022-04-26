<?php
print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtCorreo"]) || empty($_POST["txtTipo"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/db.php';
    $nombre = $_POST["txtNombre"];
    $correo = $_POST["txtCorreo"];
    $tipo_usuario = $_POST["txtTipo"];
    
    $sentencia = $bd->prepare("INSERT INTO usuario(nombre,correo,tipo_usuario) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre,$correo,$tipo_usuario]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
       // header('Location: index.php?mensaje=error');
       echo 'error' ;
        exit();
    }
?>