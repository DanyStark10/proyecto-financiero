<?php include 'template/header.php' ?>

<?php
    if(!isset($usuario)){
        header("Location: login.php?mensaje=inicio");
    }
?>

<?php include 'template/footer.php' ?>