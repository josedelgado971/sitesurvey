<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../inicio.html");
    exit();

    }

    if($_POST['nombre'] != null && $_POST['cantidad'] != null ){
        //$sql = "INSERT INTO conejos (ident,alojamiento,alimento,cuidados,otros) VALUES (ident = '" . trim($_POST['ident']) . "' ,alojamiento = '" . trim($_POST['alojamiento']) . "' ,alimento = '" . trim($_POST['alimento']) . "' ,cuidados = '" . trim($_POST['cuidados']) . "' ,otros = '" . trim($_POST['otros']) . "')";
        $sql = "INSERT INTO medicinas (nombre,cantidad) VALUES ('" .trim($_POST['nombre']). "' ,'" .trim($_POST['cantidad']). "' )";
        if($conn->query($sql)){
            echo "<script>alert('agregado exitosamente')</script>";
            header("Refresh:0 , url = ../categorias/medicina.php");
            mysqli_close($conn);
            exit();

        }
        else{
            echo "<script>alert('fallo al agregar')</script>";
            header("Refresh:0 , url = ../categorias/medicina.php");
            mysqli_close($conn);
            exit();

        }
    }
    else{
        echo "<script>alert('Please fill in information.')</script>";
        header("Refresh:0 , url = ../categorias/medicina.php");
        mysqli_close($conn);
        exit();

    }
    
?>