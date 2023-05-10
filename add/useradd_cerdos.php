<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../inicio.html");
    exit();

    }

    if($_POST['ident'] != null && $_POST['alojamiento'] != null && $_POST['alimento'] != null && $_POST['cuidados'] != null && $_POST['otros'] != null ){
        //$sql = "INSERT INTO cerdos (ident,alojamiento,alimento,cuidados,otros) VALUES (ident = '" . trim($_POST['ident']) . "' ,alojamiento = '" . trim($_POST['alojamiento']) . "' ,alimento = '" . trim($_POST['alimento']) . "' ,cuidados = '" . trim($_POST['cuidados']) . "' ,otros = '" . trim($_POST['otros']) . "')";
        $sql = "INSERT INTO cerdos (ident,alojamiento,alimento,cuidados,otros) VALUES ('" .trim($_POST['ident']). "' ,'" .trim($_POST['alojamiento']). "' ,'" .trim($_POST['alimento']). "' ,'" .trim($_POST['cuidados']). "' ,'" .trim($_POST['otros']). "')";
        if($conn->query($sql)){
            echo "<script>alert('agregado exitosamente')</script>";
            header("Refresh:0 , url = ../categorias/usercerdos.php");
            exit();

        }
        else{
            echo "<script>alert('fallo al agregar')</script>";
            header("Refresh:0 , url = ../categorias/usercerdos.php");
            exit();

        }
    }
    else{
        echo "<script>alert('Please fill in information.')</script>";
        header("Refresh:0 , url = ../categorias/usercerdos.php");
        exit();

    }
    mysqli_close($conn);
?>