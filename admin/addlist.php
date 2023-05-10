<?php
session_start();
require_once "../Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=../inicio.html");
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM cerdos ORDER BY id ASC";
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
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        font-family: Arial, Helvetica, sans-serif;
        background-color: #3aafa9;
    }

    * {
        margin: 0;
        padding: 0;
    }

    header {
        width: 100%;
        overflow: hidden;
        /*position: fixed;*/
        margin-bottom: 20px;
    }


    header .logo {
        color: #17252A;
        font-size: 50px;
        line-height: 40px;
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

    .form-group {
        margin-left: 600px;
        width: 500px;
        margin: 0 auto;
    }

    [type=text],
    [type=number] {
        font-family: "Mitr", sans-serif;
        border-radius: 15px;
        border: transparent;
        padding: 7px 200px 7px 5px;
    }

    .modify {
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

    .modify:hover {
        background: #25414b;
        
    }

    label {
        font-family: "Mitr", sans-serif;
    }
    </style>
</head>

<body>
    <header>
        <div class="logo">Agregar Cerdos</div>
        <nav>
            <a href="../categorias/cerdos.php" role="button">Volver</a>
        </nav>
    </header>
<<<<<<< Updated upstream
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
=======

    <div class="addproduct" style="text-align: center;">
        <form method="POST" action="../main/addlist.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Identificacion</label>
                <br>
                <input type="text" class="form-control" name="ident" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ubucacion</label>
                <br>
                <input type="text" class="form-control" name="alojamiento" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alimentacion</label>
                <br>
                <input type="text" class="form-control" name="alimento" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Medicinas</label>
                <br>
                <input type="text" class="form-control" name="cuidados" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">observaciones</label>
                <br>
                <input type="text" class="form-control" name="otros" required>
                <!--<input type="hidden" name="id" />-->
            </div>
            <br>
            <div class="form-button" style="text-align: center;">
                <button type="submit" class="modify">Agregar</button>
            </div>
        </form>
>>>>>>> Stashed changes
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>