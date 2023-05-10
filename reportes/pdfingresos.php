
<?php
ob_start();
?>
<?php
        session_start();
        require_once "../Database/Database.php";
        
        // Verifica si la variable de sesión 'username' está definida y no es nula
        if (!isset($_SESSION['username']) || $_SESSION['username'] == null) {
            echo "<script>alert('Please login.');</script>";
            header("Location: ../inicio.html");
            exit();
        }
        
        $username = $_SESSION['username'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        
        if (!$fecha_inicio || !$fecha_fin) {
            echo "<script>alert('Fechas Invalidas');</script>";
            //die('Fechas inválidas');
            header("Refresh:0 , url = ../reportes/reporte.php");
        }
        
        $sql = "SELECT * FROM ingreso WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
        $query_ingreso = mysqli_query($conn, $sql);
      
        ?>
        

    
<head>
    <meta charset="UTF-8" />
    <title>Reporte Ingresos</title>
    <style type="text/css">
    table.blueTable {
        border: 1px solid #1C6EA4;
        background-color: #EEEEEE;
        width: 100%;
        text-align: left;
        border-collapse: collapse;
    }

    table.blueTable td,
    table.blueTable th {
        border: 1px solid #AAAAAA;
        padding: 3px 2px;
    }

    table.blueTable tbody td {
        font-size: 13px;
    }

    table.blueTable tr:nth-child(even) {
        background: #D0E4F5;
    }

    table.blueTable thead {
        background-color: : #1C6EA4;
        background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        border-bottom: 2px solid #444444;
    }

    table.blueTable thead th {
        font-size: 15px;
        font-weight: bold;
        color: #FFFFFF;
        background-color: #1C6EA4;
        border-left: 2px solid #D0E4F5;
    }

    table.blueTable thead th:first-child {
        border-left: none;
    }

    table.blueTable tfoot {
        font-size: 14px;
        font-weight: bold;
        color: #FFFFFF;
        background: #D0E4F5;
        background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        border-top: 2px solid #444444;
    }

    table.blueTable tfoot td {
        font-size: 14px;
    }

    table.blueTable tfoot .links {
        text-align: right;
    }

    table.blueTable tfoot .links a {
        display: inline-block;
        background: #1C6EA4;
        color: #FFFFFF;
        padding: 2px 8px;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <h1>Reporte Ingresos</h1>
    <table class="blueTable">
        <thead>
            <tr>
                <th scope="col">Orden</th>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Fecha:Registro</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $idpro = 1;
                while ($row_s = mysqli_fetch_array($query_ingreso)) { ?>
            <tr>
                <td scope="row">
                    <h1><?php echo $idpro ?></h1>
                </td>
                <td>
                    <?php echo $row_s['id'] ?>
                </td>
                <td>
                    <?php echo $row_s['proname'] ?>
                </td>
                <td>
                    <?php echo $row_s['amount'] ?>
                </td>
                <td>
                    <?php echo $row_s['price'] ?>
                </td>
                <td class="timeregis">
                    <?php echo $row_s['fecha'] ?>
                </td>
            </tr>
            <?php
                    $idpro++;
                } ?>

        </tbody>
        </tr>
    </table>
</body>

<?php
$html=ob_get_clean();
//echo $html;

require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

$dompdf->render();
$dompdf->stream("reporte_ingresos.pdf", array("Attachment" => true));


?>