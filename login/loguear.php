<?php
    include_once "../model/db.php";
    session_start();

    $correo = $_POST['txtCorreo'];
    $password = $_POST['txtPassword'];

    
    $resultado = $bd -> query("SELECT COUNT(*) as contar FROM usuario WHERE correo = '$correo' AND password = '$password'");
    $count = $resultado->fetchColumn();
  

    if ($count >0){
         $_SESSION['username'] = $correo;
        header("Location: ../index.php");
    }else{
        header("Location: ../login.php?mensaje=error");

    }
?>