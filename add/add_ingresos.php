<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../inicio.html");
    exit();

    }

    if($_POST['proname'] != null && $_POST['amount'] != null && $_POST['price'] != null){
        
        $sql = "INSERT INTO ingreso (proname,amount,price) VALUES ('" .trim($_POST['proname']). "' ,'" .trim($_POST['amount']). "' ,'" .trim($_POST['price']). "')";
        if($conn->query($sql)){
            echo "<script>alert('agregado exitosamente')</script>";
            header("Refresh:0 , url = ../categorias/productos.php");
            mysqli_close($conn);
            exit();

        }
        else{
            echo "<script>alert('fallo al agregar')</script>";
            header("Refresh:0 , url = ../categorias/productos.php");
            mysqli_close($conn);
            exit();

        }
    }
    else{
        echo "<script>alert('Please fill in information.')</script>";
        header("Refresh:0 , url = ../categorias/productos.php");
        mysqli_close($conn);
        exit();

    }
    
?>