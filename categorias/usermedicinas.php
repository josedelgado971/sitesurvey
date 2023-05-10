<?php
session_start();
require_once "../Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=../inicio.html");
    exit();
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM medicinas ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Medicinas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="faviconconfiguroweb.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <style>
    body {
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        font-family: Arial, Helvetica, sans-serif;
        background-color: #3aafa9;
    }

    .container {
        width: 500px;
        height: 20px;
        margin: 0 auto;
        margin-bottom: 50px;
        border-radius: 30px;
        text-align: center;
        background-color: transparent;
        border-top: solid 7px black;
        padding-bottom: 20px;
    }

    table th,
    tr,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px 0px 10px 0px;
    }

    table {
        width: 100%;
    }

    th {
        color: white;
        background-color:  #2b7a78;
    }

    tr {
        background-color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .timeregis {
        text-align: center;
    }

    .modify {
        text-align: center;
    }

    .delete {
        text-align: center;
    }

    .modify .bfix {
        border-radius: 15px;
        background-color: #17252A;
        color: white;
        text-decoration: none;
        padding: 4px 20px 4px 20px;
        transition: 0.5s;
    }

    .modify .bfix:hover {
        background-color:  #25414b;
        color: white;
    }

    .delete .bdelete {
        border-radius: 15px;
        background-color: #17252A;
        text-decoration: none;
        color: white;
        padding: 4px 20px 4px 20px;
        transition: 0.5s;
    }

    .delete .bdelete:hover {
        background-color:  #25414b;
        color: white;
    }

    * {
        margin: 0;
        padding: 0;
    }

    header {
       width: 100%;
        overflow: hidden;
        margin-bottom: 20px;
        height: 70px;
        line-height: 100px; 
        text-align: center;
    }

    header nav {
        float: right;
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
    </style>
</head>

<body>
    <!--<img src="../vaca_mirando.jpg" width="1400" height="700" />-->
    <header>
        <nav>
            <a href="../add/usermedicinas.php" role="button">Agregar</a>
            <a href="../usuario/user.php" role="button">Volver</a>
            
        </nav>
    </header>


    <div class="container">
        <h1>Medicinas</h1>
    </div>
    <div class="table-product">
        <table>
            <tr>
                <th scope="col">Orden</th>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Fecha:Registro</th>
            </tr>
            <tbody>
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td scope="row">
                        <?php echo $idpro ?>
                    </td>
                    <td>
                        <?php echo $row['id'] ?>
                    </td>
                    <td>
                        <?php echo $row['nombre'] ?>
                    </td>
                    <td>
                        <?php echo $row['cantidad'] ?>
                    </td>
                    <td class="timeregis">
                        <?php echo $row['time'] ?>
                    </td>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        
    </div>
    <div class="footer">
        <!--<IMG SRC="../imagenes/sitesurvey.png" ALIGN=LEFT WIDTH=75 HEIGHT=75 >-->
        
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>