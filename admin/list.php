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
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
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
        padding-bottom: 20px;
    }

    .botones {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    button {
        margin: 10px;
        padding: 10px 100px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        -webkit-transition: all 500ms ease;
        -o-transition: all 500ms ease;
        transition: all 500ms ease;
        width: 400px;
        height: 50px;
    }

    button:hover {
        background-color: #3e8e41;
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
    </style>
</head>

<body>
    <!--<img src="../vaca_mirando.jpg" width="1400" height="700" />-->
    <header>
        <IMG SRC="../imagenes/sitesurvey.png" ALIGN=LEFT WIDTH=90 HEIGHT=90>
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
    <div class="botones">
        <a href="../categorias/cerdos.php"><button>Cerdos</button></a>
        <a href="#"><button>Vacas</button></a>
        <a href="#"><button>Caballos</button></a>
        <a href="#"><button>Conejos</button></a>
        <a href="#"><button>Peces</button></a>
        <a href="#"><button>Gallinas</button></a>
        <a href="#"><button>Leche</button></a>
        <a href="#"><button>Cosechas</button></a>
        <a href="#"><button>Ordeño de Cerdos</button></a>
        <a href="#"><button>Medicamentos de Urgencia</button></a>
    </div>
    </div>
    <div class="footer">
        <p>
            <IMG SRC="../imagenes/sitesurvey.png" ALIGN=LEFT WIDTH=75 HEIGHT=75>
        </p>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>