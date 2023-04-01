<?php
session_start();
require_once "../Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=../inicio.html");
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Agregar Producto</title>
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
        background: #2b8fc7;
        margin-bottom: 20px;
    }


    header .logo {
        color: #f2f2f2;
        font-size: 50px;
        line-height: 100px;
        float: left;
    }

    header nav {
        float: right;
        line-height: 100px;
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

    .form-group {
        margin-left: 600px;
    }

    [type=text],
    [type=number] {
        font-family: "Mitr", sans-serif;
        border-radius: 15px;
        border: transparent;
        padding: 7px 200px 7px 5px;
    }

    .return {
        border-radius: 15px;
        background-color: #ffcc33;
        color: black;
        text-decoration: none;
        padding: 4px 40px 4px 40px;
        margin: 0px 0px 50px 100px;
        font-size: 20px;
        transition: 0.5s;

    }

    .return:hover {
        background-color: #fdb515;
        color: white;
    }

    .modify {
        border-radius: 15px;
        border: transparent;
        color: white;
        padding: 4px 40px 4px 40px;
        margin: 0px 50px 50px 100px;
        font-size: 20px;
        border-collapse: collapse;
        background-color: #00A600;
        font-family: "Mitr", sans-serif;
        transition: 0.5s;

    }

    .modify:hover {
        color: black;
        background-color: #BBFFBB;
    }
    </style>
</head>

<body>
    <header>
        <div class="logo">site survey</div>
        <nav>
            <a href="../logout.php" role="button">Cerrar Sesión</a>
        </nav>
    </header>
    <!--<div class="header">
        <p>ConfiguroWeb</p>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </div>-->
    <div class="container">
        <h1>Agregar Producto</h1>
        <h2>Has accedido como <?php echo $str = strtoupper($username) ?></h2>
    </div>
    <div class="table-product">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Orden</th>
                    <th scope="col">ID:Producto</th>
                    <th scope="col">Nombre:Producto</th>
                    <th scope="col">Cantidades</th>
                    <th scope="col">Fecha:Registro</th>
                </tr>
            </thead>
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
                </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
        <div class="addproduct">
            <form method="POST" action="../main/addlist.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre de Producto</label>
                    <br>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Cantidad</label>
                    <br>
                    <input type="number" class="form-control" name="amount" required>
                </div> <br>
                <div class="form-button">
                    <button type="submit" class="modify" style="float:right">Agregar Producto</button>
                    <a name="" id="" class="return" href="../admin/list.php" role="button" style="float:left">Volver</a>
                </div>
            </form>
        </div>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>