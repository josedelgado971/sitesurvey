<?php
    session_start();
    require_once "../Database/Database.php";
    if ($_SESSION['username'] == null){
        echo "<script>alert('Favor ingresar con tus credenciales')</script>";
        header("Refresh:0 , url = ../inicio.html");
        exit();

    }
    $delete_num = $_GET['id'];
    $sql_delete =  "DELETE FROM cerdos WHERE id = '$delete_num'";
    $query_delete = mysqli_query($conn,$sql_delete);
    $row = mysqli_affected_rows($conn);
    if($row > 0){
        echo "<script>alert('Eliminación de Producto Exitosa')</script>";        
        header("Refresh: 0 , url = ../categorias/cerdos.php");
        exit();

    }
    else{
        echo "<script>alert('No se pudo eliminar producto')</script>";
        header("Refresh: 0 , url = ../categorias/cerdos.php");
        exit();

    }
    mysqli_close($conn);
?>