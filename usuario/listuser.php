<?php
session_start();
require_once "../Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Lista de Categorias</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="faviconconfiguroweb.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #0e8503;
    }

    * {
        margin: 0;
        padding: 0;
    }

    header {
        width: 100%;
        overflow: hidden;
        background: #004872;
        margin-bottom: 20px;
    }


    header .logo {
        color: #f2f2f2;
        font-size: 50px;
        line-height: 60px;
        float: left;
    }

    header nav {
        float: right;
        line-height: 60px;
    }

    header nav a {
        display: inline-block;
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
        background: #f56f3a;
        border-radius: 50px;
    }

    .container {
        margin: 90px auto;
        margin-bottom: 50px;
        border-radius: 30px;
        text-align: center;
        background-color: rgb(39, 197, 0);
        width: 40%;
        padding-bottom: 10px;
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
        background-color: #298dba;
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

    .acces {
        text-align: center;
    }

    .acces .bacces {
        border-radius: 15px;
        background-color: #298dba;
        text-decoration: none;
        color: white;
        padding: 4px 20px 4px 20px;
        transition: 0.5s;
    }

    .acces .bacces:hover {
        background-color: #a5a5a5;
        color: white;
    }

    .Addlist {
        margin-right: 100px;
        padding: 5px 30px 5px 30px;
        border-radius: 15px;
        text-decoration: none;
        color: white;
        background-color: #298dba;
        transition: 0.5s;
    }

    .Addlist:hover {
        color: black;
        background-color: #BBFFBB;
    }
    </style>
</head>

<body>

    <header>
        <div class="logo">site survey</div>
        <nav>
            <a name="" id="" class="button-logout" href="../logout.php" role="button">Cerrar Sesión</a>
        </nav>
    </header>
    <!--<div class="header">
        <h3>SITE SURVEY GRANJA BENGALA UQ</h3>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
        
    </div>-->
    <div class="container">
        <h1>Lista de Categorias</h1>
        <h2>Has accedido como <?php echo $str = strtoupper($username) ?></h2>
    </div>
    <div class="table-product">
        <table>
            <tr>
                <th scope="col">Orden</th>
                <th scope="col">ID:Producto</th>
                <th scope="col">Nombre:Producto</th>
                <th scope="col">Cantidades</th>
                <th scope="col">Fecha:Registro</th>

            </tr>
            <tbody>
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td scope="row"><?php echo $idpro ?></td>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['proname'] ?></td>
                    <td><?php echo $row['amount'] ?></td>
                    <td class="timeregis"><?php echo $row['time'] ?></td>
                    <td class="acces"><a name="id" id="" class="bacces" href="#" role="button">
                            Acceder
                        </a></td>
                </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
        <a name="" id="" class="Addlist" style="float:right" href="../usuario/addlistuser.php" role="button">Agregar Producto</a>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>