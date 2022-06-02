<?php
print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtCorreo"]) || empty($_POST["txtTipo"]) || empty($_POST["txtPassword"]) || empty($_POST["txtEscuela"]) ){
        header('Location: usuario.php?mensaje=falta');
        exit();
    }

    include_once '../model/db.php';
    $nombre = $_POST["txtNombre"];
    $correo = $_POST["txtCorreo"];
    $tipo_usuario = $_POST["txtTipo"];
    $password = $_POST["txtPassword"];
    $escuela = $_POST["txtEscuela"];
    
    $sentencia = $bd->prepare("INSERT INTO usuario(nombre,correo,tipo_usuario,password,id_escuela,estado) VALUES (?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$correo,$tipo_usuario,$password,$escuela,'1']);

    if ($resultado === TRUE) {
        header('Location: ../usuario.php?mensaje=registrado');
    } else {
       // header('Location: index.php?mensaje=error');
       echo 'error' ;
        exit();
    }
?>