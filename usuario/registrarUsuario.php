<?php
print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtCorreo"]) || empty($_POST["txtTipo"]) || empty($_POST["txtPassword"])){
        header('Location: usuario.php?mensaje=falta');
        exit();
    }

    include_once '../model/db.php';
    $nombre = $_POST["txtNombre"];
    $correo = $_POST["txtCorreo"];
    $tipo_usuario = $_POST["txtTipo"];
    $password = $_POST["txtPassword"];
    
    $sentencia = $bd->prepare("INSERT INTO usuario(nombre,correo,tipo_usuario,password) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$correo,$tipo_usuario,$password]);

    if ($resultado === TRUE) {
        header('Location: usuario.php?mensaje=registrado');
    } else {
       // header('Location: index.php?mensaje=error');
       echo 'error' ;
        exit();
    }
?>