<?php
include ('../../config.php');
$dia = date('d');
$mes = date('m');
$anio = date('Y');

if($mes=="1")$mes = "Enero";
if($mes=="2")$mes = "Febrero";
if($mes=="3")$mes = "Marzo";
if($mes=="4")$mes = "Abril";
if($mes=="5")$mes = "Mayo";
if($mes=="6")$mes = "Junio";
if($mes=="7")$mes = "Julio";
if($mes=="8")$mes = "Agosto";
if($mes=="9")$mes = "Septiembre";
if($mes=="10")$mes = "Octubre";
if($mes=="11")$mes = "Noviembre";
if($mes=="12")$mes = "Diciembre";

//$id_facturacion = $_GET['id_facturacion'];

$id_informacion = $_GET['id_informacion'];
$nro_factura = $_GET['nro_factura'];
$id_cliente = $_GET['id_cliente'];

// recuperar la ciudad de la tabla informaciones

$query_info = $pdo->prepare("SELECT * FROM tb_informaciones WHERE id_inf = '$id_informacion' AND estado = '1' ");
$query_info->execute();
$infos = $query_info->fetchAll(PDO::FETCH_ASSOC);

foreach($infos as $info){
$ciudad = $info['ciudad'];
}
  $fecha_factura = "$ciudad, $dia de $mes de $anio";

$fecha_ingreso = $_GET['fecha_ingreso'];
$hora_ingreso = $_GET['hora_ingreso'];

// fecha de salida
 $fecha_salida = date('d-m-Y');

 //hora de salida
$hora_salida = date('H:i');


// calculo del tiempo
$cambiando_hora_ingreso = strtotime($hora_ingreso);
$cambiando_hora_salida = strtotime($hora_salida);
$diferencia = ($cambiando_hora_salida - $cambiando_hora_ingreso)/3600;
$hora_calculada = (int) $diferencia;

$diferencia_minutos =  ($cambiando_hora_salida - $cambiando_hora_ingreso)/60;
$calculando = $hora_calculada *60;
$minutos_calculados = $diferencia_minutos - $calculando;

echo $tiempo = $hora_calculada ."horas y " .$minutos_calculados. "minutos";

$cuviculo = $_GET['cuviculo'];
$detalle = $_GET['detalle'];
$precio = $_GET['precio'];
$cantidad = $_GET['cantidad'];
$total = $_GET['total'];
$monton_total = $_GET['monton_total'];
$monton_literal = $_GET['monton_literal'];
$user_sesion = $_GET['user_sesion'];

$sentencia = $pdo->prepare('INSERT INTO tb_facturaciones
(id_facturacion, id_informacion, nro_factura, id_cliente, fecha_factura, fecha_ingreso, hora_ingreso, fecha_salida, hora_salida, tiempo, cuviculo, detalle, precio, cantidad, total, monton_total, monton_literal, user_sesion, qr, fyh_creacion, estado)
VALUES ( :id_facturacion,: id_informacion,: nro_factura,: id_cliente,: fecha_factura,: fecha_ingreso,: hora_ingreso,: fecha_salida,: hora_salida,: tiempo,: cuviculo,: detalle,: precio,: cantidad,: total,: monton_total,: monton_literal,: user_sesion,:fyh_creacion,:estado)');

$sentencia->bindParam(':id_facturacion',$id_facturacion);
$sentencia->bindParam(': id_informacion',$id_informacion);
$sentencia->bindParam(': nro_factura',$nro_factura);
$sentencia->bindParam(': id_cliente',$id_cliente);
$sentencia->bindParam(': fecha_factura',$fecha_factura);
$sentencia->bindParam(': fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam(': hora_ingreso',$hora_ingreso);
$sentencia->bindParam(': fecha_salida',$fecha_salida);
$sentencia->bindParam(': hora_salida',$hora_salida);
$sentencia->bindParam(': tiempo',$tiempo);
$sentencia->bindParam(': cuviculo',$cuviculo);
$sentencia->bindParam(': detalle',$detalle);
$sentencia->bindParam(': precio',$precio);
$sentencia->bindParam(': cantidad',$cantidad);
$sentencia->bindParam(': total',$total);
$sentencia->bindParam(': monton_total',$monton_total);
$sentencia->bindParam(': monton_literal',$monton_literal);
$sentencia->bindParam(': user_sesion',$user_sesion);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

/*
if($sentencia->execute()){
echo 'success';
//header('Location:' .$URL.'/');
}else{
echo 'error al registrar a la base de datos';
}
*/

?>