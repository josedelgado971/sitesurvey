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
    <title>Editar Caballos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="dp.png">
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

    .container {
        margin: 90px auto;
        margin-bottom: 50px;
        border-radius: 30px;
        text-align: center;
        background-color: white;
        width: 40%;
        padding-bottom: 10px;
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
        <div class="logo">Editar Medicina</div>
        <nav>
            <a href="../categorias/medicina.php" role="button">Volver</a>
        </nav>
    </header>

    <div class="fixproduct" style="text-align: center;">
        <form method="POST" action="../edit/fixmedicinas.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <br>
                <input type="text" class="form-control" name="nombre" value="<?php echo $_GET['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Cantidad</label>
                <br>
                <input type="text" class="form-control" name="cantidad" value="<?php echo $_GET['cantidad']; ?>"
                    required>
                <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id" />
            </div>
            <br>
            <div class="form-button" style="text-align: center;">
                <button type="submit" class="modify">Guardar</button>
            </div>
        </form>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>