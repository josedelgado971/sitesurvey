<?php
     session_start();
     require_once "../Database/Database.php";
     
     // Verifica si la variable de sesión 'username' está definida y no es nula
     if (!isset($_SESSION['username']) || $_SESSION['username'] == null) {
         echo "<script>alert('Please login.');</script>";
         header("Refresh:0 , url=../inicio.html");
         exit();
     }
     
     $username = $_SESSION['username'];
     $sql_fetch_ingreso = "SELECT * FROM ingreso ORDER BY id ASC";
     $sql_fetch_salida = "SELECT * FROM salida ORDER BY id ASC";
     $query_ingreso = mysqli_query($conn, $sql_fetch_ingreso);
     $query_salida = mysqli_query($conn, $sql_fetch_salida);
?>
<!doctype html>
<html lang="en">

<head>
    <title>Reportes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/png" sizes="16x16" href="imagenes/sitesurvey.png">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="imagenes/sitesurvey.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">

    <style>
    body {
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        font-family: Arial, Helvetica, sans-serif;
        background-color: #3aafa9;
    }

    header {
        width: 100%;
        overflow: hidden;
        margin-bottom: 20px;
        height: 70px;
        line-height: 100px;
        text-align: center;
    }


    header .logo {
        color: #17252A;
        font-size: 50px;
        line-height: 50px;
        /* Disminuir el tamaño de los saltos entre renglones */
        float: left;
    }

    header nav {
        float: right;
        line-height: 60px;
    }

    header nav a {
        display: inline-block;
        background: #17252A;
        border-radius: 50px;
        color: #fff;
        text-decoration: none;
        padding: 10px 20px;
        line-height: normal;
        font-size: 20px;
        font-weight: bold;
        -webkit-transition: all 500ms ease;
        -o-transition: all 500ms ease;
        transition: all 500ms ease;
    }

    header nav a:hover {
        background: #25414b;
        border-radius: 50px;
    }

    /* funcionamiento básico del sistema de pestañas */
    .tab-content {
        display: none;
    }

    .tab:target .tab-content,
    .tab:last-of-type .tab-content {
        display: block;
    }

    .tab:target~.tab:last-of-type .tab-content {
        display: none;
    }

    /* parámetros para configurar las pestañas */
    :root {
        --tabs-border-color: #ABCDEF;
        --tabs-border-size: 3px;
        --tabs-text-color: white;
        --tabs-dark-color: #012345;
        --tabs-lite-color: #345678;
        --tabs-width: 120px;
        --tabs-height: 40px;
    }

    /* aspecto básico */
    body {
        font-family: sans-serif;
        line-height: 1.2;
    }

    h2,
    p {
        margin: 0;
    }

    a {
        color: inherit;
        text-decoration: none;
    }

    .tabs * {
        box-sizing: border-box;
    }

    /* esto es para posicionar las pestañas correctamente */
    .tab-container {
        position: relative;
        padding-top: var(--tabs-height);
        /* en esta zona colocaremos las pestañas */
    }

    #tab1>a {
        --tabs-position: 0;
    }

    #tab2>a {
        --tabs-position: 1;
    }

    #tab3>a {
        --tabs-position: 2;
    }

    #tab4>a {
        --tabs-position: 3;
    }

    #tab5>a {
        --tabs-position: 4;
    }

    #tab6>a {
        --tabs-position: 5;
    }

    #tab7>a {
        --tabs-position: 6;
    }

    #tab8>a {
        --tabs-position: 7;
    }

    #tab9>a {
        --tabs-position: 8;
    }

    .tab>a {
        text-align: center;
        position: absolute;
        width: calc(var(--tabs-width));
        height: calc(var(--tabs-height) + var(--tabs-border-size));
        top: 0;
        left: calc(var(--tabs-width) * var(--tabs-position));
        /* posición de cada pestaña */
    }

    /* más aspecto */
    .tabs {
        padding: 10px;
        color: var(--tabs-text-color);
    }

    .tab-content {
        background-color: var(--tabs-lite-color);
        padding: 20px;
        border: var(--tabs-border-size) solid var(--tabs-border-color);
        border-radius: 0 0 10px 10px;
        position: relative;
        z-index: 100;
        color: black;
    }

    .tab>a {
        background-color: var(--tabs-dark-color);
        padding: 10px;
        border: var(--tabs-border-size) solid var(--tabs-border-color);
        border-radius: 10px 10px 0 0;
        border-bottom: 0;
    }

    .tab:target>a,
    .tab:last-of-type>a {
        background-color: var(--tabs-lite-color);
        z-index: 200;
    }

    .tab:target~.tab:last-of-type>a {
        background-color: var(--tabs-dark-color);
        z-index: 0;
    }

    form label {
        display: block;
        margin-bottom: 10px;
        color: black;
    }

    form input[type="date"] {
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 5px;
    }

    form button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    form button[type="submit"]:hover {
        background-color: #0062cc;
    }
    </style>
</head>

<body>
    <!--<img src="../vaca_mirando.jpg" width="1400" height="700" />-->
    <header>
        <div class="logo">Reportes</div>
        <nav>

            <a href="../categorias/userproductos.php" role="button">Volver</a>

        </nav>
    </header>

    <div class="tabs">
        <div class="tab-container">
            <div id="tab2" class="tab">
                <a href="#tab2">Salidas</a>
                <div class="tab-content">

                    <form action="../reportes/pdfsalidas.php" method="post">
                        <label for="fecha_inicio">Fecha inicio:</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio">
                        <label for="fecha_fin">Fecha fin:</label>
                        <input type="date" name="fecha_fin" id="fecha_fin">
                        <button type="submit">Generar reporte</button>
                    </form>

                </div>
            </div>
            <div id="tab1" class="tab">
                <a href="#tab1">Ingresos</a>
                <div class="tab-content">
                    <form action="../reportes/pdfingresos.php" method="post">
                        <label for="fecha_inicio">Fecha inicio:</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio">
                        <label for="fecha_fin">Fecha fin:</label>
                        <input type="date" name="fecha_fin" id="fecha_fin">
                        <button type="submit">Generar reporte</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <div class="footer">
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>