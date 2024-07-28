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


$html = '<h1>HTML Example</h1>
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
        <b>Desde: </b> 11/10/2024  hora: 18:00<br>
        <b>Hasta: </b> 11/10/2024  hora: 21:00<br>
        <b>Tiempo:</b>3 horas <br>
     -----------------------------------------<br>
     <table border="1" cellpadding="2px">
        <tr style="text-align: center">
            <td width="150px">Detalle</td>
            <td width="70px">Cantidad</td>
            <td width="70px">Precio</td>
            <td width="100px">Total</td>
        </tr>
        <tr>
            <td style="text-align: center">Servicio de parqueo de 2 horas en el cuviculo 10</td>
            <td style="text-align: center">2</td>
            <td style="text-align: center">$5000</td>
            <td style="text-align: center">$10000</td>
        </tr>
     </table>
     <p style="text-align:right"><b>Monto total</b> $10000</p></br>
     <p><b>Son: </b> Diez mil Pesos argentinos</p>
     -----------------------------------------<br>
     <b>Usuario: </b> '.$user_sesion.'
     -----------------------------------------<br>
     <p style="text-align:center">
      <img src="data:image/jpeg;base64,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">
     </p>
     <p>"Esta factura contribuye al desarrollo del pais"</p>
      </div>
      
 </div>
 </p>
</div>

   ';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

ob_end_clean();

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
