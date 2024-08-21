<?php
include ('../../config.php');
include('../facturacion/literal.php');

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
 $fecha_salida_para_calcular = date('Y-m-d');
$fecha_salida = $fecha_salida_para_calcular;
 //hora de salida
$hora_salida = date('H:i');


// calculo del tiempo en horas
$cambiando_hora_ingreso = strtotime($hora_ingreso);
$cambiando_hora_salida = strtotime($hora_salida);
$diferencia = ($cambiando_hora_salida - $cambiando_hora_ingreso)/3600;
$hora_calculada = (int) $diferencia;

$diferencia_minutos =  ($cambiando_hora_salida - $cambiando_hora_ingreso)/60;
$calculando = $hora_calculada *60;
$minutos_calculados = $diferencia_minutos - $calculando;


$cuviculo = $_GET['cuviculo'];

// calculo los DIAS
$dato1 = new DateTime($fecha_ingreso);
$dato2 = new DateTime($fecha_salida_para_calcular);
$fecha_calculada = $dato1->diff($dato2);
$dias_calculados = $fecha_calculada->days.'dias';


if($dias_calculados <1){
   $tiempo = $hora_calculada ."horas y " .$minutos_calculados. "minutos";
}else{
   $tiempo = $dias_calculados. $hora_calculada ."horas y " .$minutos_calculados. "minutos";
}
// detalle no viene por get
$detalle = "Servicio de Estacionamiento de: " .$tiempo;


// precio
// calcula el precio del cliente en horas
$contador_precio = 0;
$sql_precio = "SELECT * FROM tb_precios WHERE cantidad = '$hora_calculada' and detalle = 'Horas' and estado = '1'";

$query_precio = $pdo->prepare($sql_precio);
$query_precio->execute();
$precio_datos = $query_precio->fetchAll(PDO::FETCH_ASSOC);

$precio_hora = 0;
foreach ($precio_datos as $dato) {
    //precio en horas   
    $precio_hora = $dato['precio'];
}

// calcula el precio del cliente en DIAS

$sql_precio_dias = "SELECT * FROM tb_precios WHERE cantidad = '$dias_calculados' and detalle = 'Dia' and estado = '1'";

$query_precio_dias = $pdo->prepare($sql_precio_dias);
$query_precio_dias->execute();
$precio_datos_dias = $query_precio_dias->fetchAll(PDO::FETCH_ASSOC);

$precio_dia = 0;
foreach ($precio_datos_dias as $dato_dia) {
    //precio en DIAS   
     $precio_dia = $dato_dia['precio'];
}

$precio_final = $precio_dia + $precio_hora;

$cantidad = 1;
$total = ($precio_final * $cantidad);

$monton_total = $total;


$monto_literal = numtoletras($monton_total);

$user_sesion = $_GET['user_sesion'];

//qr buscar el nombre del cliente
$sql_cliente = "SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente' and estado_cliente = 1";
                    
    $query_cliente = $pdo->prepare($sql_cliente);
    $query_cliente->execute();
    $cliente_datos = $query_cliente->fetchAll(PDO::FETCH_ASSOC);

    foreach ($cliente_datos as $dato) {
         $nombre_cliente = $dato['nombre_cliente'];
         $dni = $dato['dni'];
         $placa = $dato['placa_auto'];
    };
$fecha_creacion  = date('Y-m-d H:i:s');

$QR = 'Factura realizada por el sistema de paqueo FLORENCIA WEB, al '.$nombre_cliente.' con DNI: '.$dni.' 
con el vehiculo con numero de placa '.$placa.' y esta factura se genero en '.$dia.' de '.$mes.' de '.$anio.' a hr: '.$hora_salida.'';
    
$sentencia = $pdo->prepare('INSERT INTO tb_facturaciones
(id_informacion, nro_factura, id_cliente, estado, fecha_factura, fecha_ingreso, hora_ingreso, fecha_salida, hora_salida, tiempo, cuviculo, detalle, precio, cantidad, total, monton_total, monton_literal, user_sesion, qr, fyh_creacion)
VALUES ( :id_informacion,:nro_factura,:id_cliente, :estado, :fecha_factura,:fecha_ingreso,:hora_ingreso,:fecha_salida,:hora_salida,:tiempo,:cuviculo,:detalle,:precio,:cantidad,:total,:monton_total,:monton_literal,:user_sesion, :qr,:fyh_creacion)');

$sentencia->bindParam(':id_informacion',$id_informacion);
$sentencia->bindParam(':nro_factura',$nro_factura);
$sentencia->bindParam(':id_cliente',$id_cliente);
$sentencia->bindParam('estado',$estado_del_registro);
$sentencia->bindParam(':fecha_factura',$fecha_factura);
$sentencia->bindParam(':fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam(':hora_ingreso',$hora_ingreso);
$sentencia->bindParam(':fecha_salida',$fecha_salida);
$sentencia->bindParam(':hora_salida',$hora_salida);
$sentencia->bindParam(':tiempo',$tiempo);
$sentencia->bindParam(':cuviculo',$cuviculo);
$sentencia->bindParam(':detalle',$detalle);
$sentencia->bindParam(':precio',$precio_final);
$sentencia->bindParam(':cantidad',$cantidad);
$sentencia->bindParam(':total',$total);
$sentencia->bindParam(':monton_total',$monton_total);
$sentencia->bindParam(':monton_literal',$monto_literal);
$sentencia->bindParam(':user_sesion',$user_sesion);
$sentencia->bindParam('qr',$QR);
$sentencia->bindParam('fyh_creacion',$fecha_creacion);



if($sentencia->execute()){?>

 <script>
 location.href = "<?php echo $URL;?>/view/facturacion/factura.php";
 </script>

<?php }else{?>
 <script>location.href = "<?php echo $URL;?>/view/facturacion/factura.php";</script>
<?php }


?>