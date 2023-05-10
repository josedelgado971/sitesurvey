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
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        font-family: Arial, Helvetica, sans-serif;
        background-color: #3aafa9;
    }

    .container {
        width: 800px;
        height: 20px;


        margin: 0 auto;
        margin-bottom: 50px;
        border-radius: 30px;
        text-align: center;
        background-color: transparent;
        border-top: solid 7px black;
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
        background-color: #17252A;
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

    button:hover{
        background: #25414b;
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
        =======
        /*button:hover {
        background-color: #25414b;
>>>>>>> Stashed changes*/
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
        height: 70px;
        line-height: 100px;
        text-align: center;
    }


    header .logo {
        color: #17252A;
        font-size: 10px;
        line-height: 20px;
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
    </style>
</head>

<body>
    <!--<img src="../vaca_mirando.jpg" width="1400" height="700" />-->
    <header>
        <!--<IMG SRC="../imagenes/sitesurvey.png" ALIGN=center WIDTH=90 HEIGHT=90>-->
        <div class="logo">
            <h1>Has accedido como
                <br>
                <?php echo $str = strtoupper($username) ?>
            </h1>
        </div>
        <nav>
            <a href="../logout.php" role="button">Cerrar Sesión</a>
        </nav>
    </header>


    <div class="container">
        <h1>Site Survey</h1>
        <h2>Lista de Categorias</h2>
    </div>
    <div class="botones">
        <a href="../categorias/usercerdos.php"><button>Cerdos</button></a>
        <a href="../categorias/uservacas.php"><button>Vacas</button></a>
        <a href="../categorias/usercaballos.php"><button>Caballos</button></a>
        <a href="../categorias/userconejos.php"><button>Conejos</button></a>
        <a href="../categorias/userpeces.php"><button>Peces</button></a>
        <a href="../categorias/userpollos.php"><button>Pollos</button></a>
        <a href="../categorias/usermedicinas.php"><button>Medicamentos de Urgencia</button></a>
        <a href="../categorias/userproductos.php"><button>productos</button></a>
    </div>

    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>