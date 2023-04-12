<?php
session_start();
require_once "../Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=../inicio.html");
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
        background-image: url("../vaca_mirando.jpg");
        
        font-family: Arial, Helvetica, sans-serif;
        background-color: white;
    }

    .container {
        width: 300px;
        height: 100px;
        margin: 90px left;
        margin-bottom: 50px;
        border-radius: 30px;
        text-align: center;
        background-color: transparent;
        border-top: solid 7px black;
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

    .modify {
        text-align: center;
    }

    .delete {
        text-align: center;
    }

    .modify .bfix {
        border-radius: 15px;
        background-color: #ffcc33;
        color: black;
        text-decoration: none;
        padding: 4px 20px 4px 20px;
        transition: 0.5s;
    }

    .modify .bfix:hover {
        background-color: #fdb515;
        color: white;
    }

    .delete .bdelete {
        border-radius: 15px;
        background-color: #e60000;
        text-decoration: none;
        color: white;
        padding: 4px 20px 4px 20px;
        transition: 0.5s;
    }

    .delete .bdelete:hover {
        background-color: #D9ddd4;
        color: red;
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

    * {
        margin: 0;
        padding: 0;
    }

    header {
        width: 100%;
        overflow: hidden;
        
        margin-bottom: 20px;
    }


    header .logo {
        color: #298dba;
        font-size: 50px;
        line-height: 100px;
        float: left;
    }

    header nav {
        float: right;
        line-height: 60px;
    }

    header nav a {
        display: inline-block;
        background: #298dba;
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
        background: #f56f3a;
        border-radius: 50px;
    }
    </style>
</head>

<body>
    <!--<img src="../vaca_mirando.jpg" width="1400" height="700" />-->
    <header>
        <IMG SRC="../imagenes/sitesurvey.png" ALIGN=LEFT WIDTH=90 HEIGHT=90 >
        <div class="logo">Site Survey</div>
        <nav>
            
            <a href="../main/member.html" role="button">Agregar Usuario</a>
            <a href="../logout.php" role="button">Cerrar Sesión</a>
            
        </nav>
    </header>


    <div class="container">
        <h1>Lista de Categorias</h1>
        <h2>Has accedido como
            <?php echo $str = strtoupper($username) ?>
        </h2>
    </div>
    <div class="table-product">
        <table>
            <tr>
                <th scope="col">Orden</th>
                <th scope="col">ID:Producto</th>
                <th scope="col">Nombre:Producto</th>
                <th scope="col">Cantidades</th>
                <th scope="col">Fecha:Registro</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
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
                        <?php echo $row['proname'] ?>
                    </td>
                    <td>
                        <?php echo $row['amount'] ?>
                    </td>
                    <td class="timeregis">
                        <?php echo $row['time'] ?>
                    </td>
                    <td class="modify"><a name="edit" id="" class="bfix"
                            href="../fix.php?id=<?php echo $row['id'] ?>&message=<?php echo $row['proname'] ?>&amount=<?php echo $row['amount']; ?> "
                            role="button">
                            Editar
                        </a></td>
                    <td class="delete"><a name="id" id="" class="bdelete"
                            href="../main/delete.php?id=<?php echo $row['id'] ?>" role="button">
                            Eliminar
                        </a></td>
                    <td class="acces"><a name="id" id="" class="bacces" href="../admin/productadmin.php" role="button">
                            Acceder
                        </a></td>
                </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
        <a class="Addlist" style="float:right" href="../admin/addlist.php" role="button">Agregar Categoria</a>
    </div>
    <div class="footer">
        <!--<IMG SRC="../imagenes/sitesurvey.png" ALIGN=LEFT WIDTH=75 HEIGHT=75 >-->
        
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>