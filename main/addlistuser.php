<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../inicio.html");
    exit();

    }

    if($_POST['name'] != null && $_POST['amount'] != null ){
        $sql = "INSERT INTO product (proname,amount) VALUES ('". trim($_POST['name']). "','". trim($_POST['amount']). "')";
        if($conn->query($sql)){
            echo "<script>alert('agregado exitosamente')</script>";
            header("Refresh:0 , url = ../usuario/listuser.php");
            exit();

        }
        else{
            echo "<script>alert('fallo al agregar')</script>";
            header("Refresh:0 , url = ../usuario/listuser.php");
            exit();

        }
    }
    else{
        echo "<script>alert('Please fill in information.')</script>";
        header("Refresh:0 , url = ../usuario/listuser.php");
        exit();

    }
    mysqli_close($conn);
?>