<?php
include_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();
include('../reportes/vistapdf_ingreso.php');
$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("repprte.pdf");
// Configura el tamaño y la orientación de la página (opcional)
//$dompdf->setPaper('A4', 'landscape');

// Renderiza el contenido HTML en PDF

// Envía el archivo PDF al navegador para su descarga o visualización

?>
