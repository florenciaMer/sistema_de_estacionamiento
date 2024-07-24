<?php

// Include the main TCPDF library (search for installation path).
require_once('../public/templates/TCPDF-main/tcpdf.php');
include_once('../app/config.php');
include_once('../app/controllers/configuraciones/listado_de_informacion.php');
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

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(79,150), true, 'UTF-8', false);

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
    -----------------------------------------
    <div style="text-align:left">
        <b>Datos del Cliente</b> <br>
        <b>Señor:</b> Florencia Merzario <br>
        <b>DNI:</b> 24564323 <br>
        </div>
      -----------------------------------------
      <b>Lugar de parqueo:</b> 3 </br>
      <b>Fecha de ingreso:</b> 15/04/2025</br>
      <b>Hora de ingreso:</b> 10:25
      -----------------------------------------
      <b>Usuario: </b> Admin
    </div>

     </p>
</div>
   ';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
