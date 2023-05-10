<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../inicio.html");
    exit();
    }
    if($_POST['nombre'] != null && $_POST['cantidad'] != null){
        //$sql = "UPDATE conejos SET proname = '" . trim($_POST['name']) . "' ,amount = '" . trim($_POST['value']) . "' WHERE id = '" . $_POST['id'] . "'";
        $sql = "UPDATE medicinas SET nombre = '" . trim($_POST['nombre']) . "' ,cantidad = '" . trim($_POST['cantidad']) . "' WHERE id = '" . $_POST['id'] . "'";
        if($conn->query($sql)){
            echo "<script>alert('Proceso completado exitósamente')</script>";
            header("Refresh:0 , url =../categorias/medicina.php");
            mysqli_close($conn);
            exit();

        }
        else{
            echo "<script>alert('Inconvenientes para realizar el proceso')</script>";
            header("Refresh:0 , url =../categorias/medicina.php");
            mysqli_close($conn);
            exit();

        }
    }
    else{
        echo "<script>alert('Por favor diligencia todos los campos')</script>";
        header("Refresh:0 , url = ../categorias/medicina.php");
        mysqli_close($conn);
        exit();

    }
    
?>
