<?php

// Include the main TCPDF library (search for installation path).
require_once('../../public/templates/TCPDF-main/tcpdf.php');
include_once('../../app/config.php');
include_once('../../app/controllers/configuraciones/listado_de_informacion.php');
include_once('../../app/controllers/tickets/listado_de_tickets.php');

//carga del encabezado
foreach ($informacion_datos as $info) {
  $id_parqueo = $info['id_inf'];
  $nombre_parqueo = $info['nombre_parqueo'];
  $actividad_empresa = $info['actividad_empresa'];
  $sucursal = $info['sucursal'];
  $direccion = $info['direccion'];
  $telefono = $info['telefono'];
  $zona = $info['zona'];
  $ciudad = $info['ciudad'];
  $pais = $info['pais'];
}

//cargar la informacion del ticket
foreach ($tickets_datos as $ticket) {
    $id_ticket = $ticket['id_ticket'];
    $nombre_cliente = $ticket['nombre_cliente'];
    $dni = $ticket['dni'];
    $cuviculo = $ticket['cuviculo'];
    $fecha_ingreso = $ticket['fecha_ingreso'];
    $hora_ingreso = $ticket['hora_ingreso'];
    session_start();
    $user_sesion = $_SESSION['usuario_sesion'];

}

//cargar la informacion de la factura

$sql_factura = "SELECT * FROM tb_facturaciones where estado = '1'";

$query_facturas = $pdo->prepare($sql_factura);
$query_facturas->execute();
$factura_datos = $query_facturas->fetchAll(PDO::FETCH_ASSOC);

foreach ($factura_datos as $factura) {
    $id_facturacion = $factura['id_facturacion'];
    $id_informacion = $factura['id_informacion'];
    $nro_factura = $factura['nro_factura'];
    $id_cliente = $factura['id_cliente'];
    $estado = $factura['estado'];
    $fecha_factura = $factura['fecha_factura'];
    $fecha_ingreso = $factura['fecha_ingreso'];
    $hora_ingreso = $factura['hora_ingreso'];
    $fecha_salida = $factura['fecha_salida'];
    $hora_salida = $factura['hora_salida'];
    $tiempo = $factura['tiempo'];
    $cuviculo = $factura['cuviculo'];
    $detalle = $factura['detalle'];
    $precio = $factura['precio'];
    $cantidad = $factura['cantidad'];
    $total = $factura['total'];
    $monton_total = $factura['monton_total'];
    $monton_literal = $factura['monton_literal'];
    $user_sesion = $factura['user_sesion'];
    $qr = $factura['qr'];
   

}



// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(120,180), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 002');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(5, 5, 5);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, 5);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('Helvetica',  5);

// add a page
$pdf->AddPage();


$html = '<h1>HTML FACTURA</h1>
<div>
    <p style="text-align:center;">'.$nombre_parqueo.'<br>
    '.$actividad_empresa.' <br>
    SUCURSAL NRO '.$sucursal.'<br>
    DIRECCION: '.$direccion.' <br>
    ZONA: '.$zona.' <br>
    TELEFONOS: '.$telefono.' <br>
    PAIS: '.$pais.' <br>
    -----------------------------------------<br>
    <div style="text-align:left">
    <b>Factura Nro</b>001<br>
    <b>Fecha de la factura</b> CABA, 12 de noviembre 2024
    ----------------------------------------<br>
        <b>Datos del Cliente</b> <br>
        <b>Señor:</b> '.$nombre_cliente.'o <br>
        <b>DNI:</b> '.$dni.' <br>
      -----------------------------------------<br>
      <div>
        <b>Desde: </b> '.$fecha_ingreso.'  hora: '.$hora_ingreso.'<br>
        <b>Hasta: </b> '.$fecha_salida.'  hora: '.$hora_salida.'<br>
       <b>Valor de la factura:</b> $'.$monton_literal.'<br>
     -----------------------------------------<br>
     <table border="1" cellpadding="2px">
        <tr style="text-align: center">
            <td width="150px">Detalle</td>
            <td width="70px">Cantidad</td>
            <td width="70px">Precio</td>
            <td width="100px">Total</td>
        </tr>
        <tr>
            <td style="text-align: center">'.$detalle.'</td>
            <td style="text-align: center">'.$cantidad.'</td>
            <td style="text-align: center">'.$precio.'</td>
            <td style="text-align: center">'.$monton_total.'</td>
        </tr>
     </table>
     <p style="text-align:right"><b>Monto total</b>'.$monton_total.'</p></br>
     <p><b>Son: </b> '.$monton_literal.'</p>
     -----------------------------------------<br>
     <b>Usuario: </b> '.$user_sesion.'
     -----------------------------------------<br>
     
      </div>
      
 </div>
 </p>
</div>

   ';

// output the HTML content
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');



$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

$QR = 'Factura realizada por el sistema de paqueo FLORENCIA WEB, al cliente Freddy Hilari con nit: 837737277323 
con el vehiculo con numero de placa 3983FREDD y esta factura se genero en 21 de octubre de 2022 a hr: 18:00';
$pdf->write2DBarcode($QR,'QRCODE,L',  30,45,35,35, $style);

//-------- FIN CODIGO QR----------------
ob_end_clean();

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
