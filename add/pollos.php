<?php
session_start();
require_once "../Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=../inicio.html");
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM pollos ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Agregar Pollos</title>
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
        margin-bottom: 20px;
    }


    header .logo {
        color: #17252A;
        font-size: 50px;
        line-height: 40px;
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
        <div class="logo">Agregar Pollos</div>
        <nav>
            <a href="../categorias/pollos.php" role="button">Volver</a>
        </nav>
    </header>

    <div class="addproduct" style="text-align: center;">
        <form method="POST" action="../add/add_pollos.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Identificación</label>
                <br>
                <input type="text" class="form-control" name="ident" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ubucación</label>
                <br>
                <input type="text" class="form-control" name="alojamiento" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alimentación</label>
                <br>
                <input type="text" class="form-control" name="alimento" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Medicinas</label>
                <br>
                <input type="text" class="form-control" name="cuidados" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Observaciones</label>
                <br>
                <input type="text" class="form-control" name="otros" required>
                <!--<input type="hidden" name="id" />-->
            </div>
            <br>
            <div class="form-button" style="text-align: center;">
                <button type="submit" class="modify">Agregar</button>
            </div>
        </form>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>