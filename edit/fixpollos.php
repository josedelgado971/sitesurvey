<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../inicio.html");
    exit();
    }
    if($_POST['ident'] != null && $_POST['alojamiento'] != null && $_POST['alimento'] != null && $_POST['cuidados'] != null && $_POST['otros'] != null){
        //$sql = "UPDATE pollos SET proname = '" . trim($_POST['name']) . "' ,amount = '" . trim($_POST['value']) . "' WHERE id = '" . $_POST['id'] . "'";
        $sql = "UPDATE pollos SET ident = '" . trim($_POST['ident']) . "' ,alojamiento = '" . trim($_POST['alojamiento']) . "' ,alimento = '" . trim($_POST['alimento']) . "' ,cuidados = '" . trim($_POST['cuidados']) . "' ,otros = '" . trim($_POST['otros']) . "' WHERE id = '" . $_POST['id'] . "'";
        if($conn->query($sql)){
            echo "<script>alert('Proceso completado exitósamente')</script>";
            header("Refresh:0 , url =../categorias/pollos.php");
            exit();

        }
        else{
            echo "<script>alert('Inconvenientes para realizar el proceso')</script>";
            header("Refresh:0 , url =../categorias/pollos.php");
            exit();

        }
    }
    else{
        echo "<script>alert('Por favor diligencia todos los campos')</script>";
        header("Refresh:0 , url = ../categorias/pollos.php");
        exit();

    }
    mysqli_close($conn);
?>
