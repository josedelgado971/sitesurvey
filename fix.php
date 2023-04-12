<?php
session_start();
require_once "Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=../inicio.html");
    exit();
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM cerdos ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Editar Producto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="dp.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #fd7e1b;
        }
    header {
        width: 100%;
        overflow: hidden;
        /*position: fixed;*/
        margin-bottom: 40px;
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
        background: #20749B;
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
        .form-group{
            margin-left: 600px;
            width: 500px;
            margin: 0 auto;
        }
        [type=text]{
            font-family: "Mitr", sans-serif;
            border-radius: 15px;
            border: transparent;
            padding: 7px 200px 7px 5px;
        }
    
        .modify{
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
        .modify:hover{
            color: black;
            background-color: #BBFFBB;
        }
    </style>
</head>
<body>
    <header>
        <IMG SRC="./imagenes/sitesurvey.png" ALIGN=LEFT WIDTH=90 HEIGHT=90 >
        <div class="logo">Site Survey</div>
        <nav>
            <a href="categorias/cerdos.php" role="button">Volver</a>
        </nav>
    </header>
    <div class="container">
        <h1>Editar</h1>
        <h2>Has accedido como <?php echo $str = strtoupper($username) ?></h2>
    </div>
    
    <div class="fixproduct">
        <form method="POST" action="main/fix.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Identificacion</label>
                <br>
                <input type="text" class="form-control" name="ident" value="<?php echo $_GET['ident']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ubucacion</label>
                <br>
                <input type="text" class="form-control" name="alojamiento" value="<?php echo $_GET['ubicacion']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alimentacion</label>
                <br>
                <input type="text" class="form-control" name="alimento" value="<?php echo $_GET['alimento']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Medicinas</label>
                <br>
                <input type="text" class="form-control" name="cuidados" value="<?php echo $_GET['medicina']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">observaciones</label>
                <br>
                <input type="text" class="form-control" name="otros" value="<?php echo $_GET['otros']; ?>" required>
                <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id" />
            </div>
            <br>
            <div class="form-button">
                <button type="submit" class="modify" style="float:right">Guardar</button>
                
            </div>
        </form>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>