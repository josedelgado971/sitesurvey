<?php
        session_start();
        require_once "../Database/Database.php";
        require_once ('../categorias/productos.php');
        
        // Verifica si la variable de sesión 'username' está definida y no es nula
        if (!isset($_SESSION['username']) || $_SESSION['username'] == null) {
            echo "<script>alert('Please login.');</script>";
            header("Location: ../inicio.html");
            exit();
        }
        
        $username = $_SESSION['username'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        
        if (!$fecha_inicio || !$fecha_fin) {
            echo "<script>alert('Fechas Invalidas');</script>";
            //die('Fechas inválidas');
            header("Refresh:0 , url = ../reportes/reporte.php");
        }
        
        $sql = "SELECT * FROM ingreso WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
        $query_ingreso = mysqli_query($conn, $sql);
        
        header("Location: ../reportes/vistapdf_ingreso.html");
        mysqli_close($conn);
        exit();
      
        ?>