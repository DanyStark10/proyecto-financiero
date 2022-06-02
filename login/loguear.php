<?php
    include_once "../model/db.php";
    session_start();
    

  
    if(isset($_GET['cerrar_sesion'])){
        session_unset();

        session_destroy();
    }

    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:

            break;
            case 2:

            break;
            case 3:

            break;
        }
    }

    if(isset($_POST['txtCorreo']) && isset($_POST['txtPassword'])){
        $correo = $_POST['txtCorreo'];
        $password = $_POST['txtPassword'];
        

        $resultado = $bd -> query("SELECT * FROM usuario WHERE correo = '$correo' AND password = '$password' and estado = '1'");
        $row = $resultado->fetch(PDO::FETCH_NUM);
        if($row == true){
            //validar rol
            $rol = $row[3];
            $escuela = $row[5];
            $_SESSION['username'] = $correo;
            $_SESSION['rol'] = $rol;
            $_SESSION['escuela'] = $escuela;
            header("Location: ../index.php");
        }else{
            //no existe
            header("Location: ../login.php?mensaje=error");
        }

    }


    /*if ($count >0){
         $_SESSION['username'] = $correo;
        header("Location: ../index.php");
    }else{
        header("Location: ../login.php?mensaje=error");

    }*/
?>