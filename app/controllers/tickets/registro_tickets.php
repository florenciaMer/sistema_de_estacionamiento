<?php

include ('../../config.php');
 $id_map = $_GET['id_map'];

 $placa = $_GET['placa'];
$placa = strtoupper($placa);

 $nombre_cliente = $_GET['nombre_cliente'];
 $dni = $_GET['dni'];
 $cuviculo = $_GET['nro_cuviculo'];
 $fecha_ingreso = $_GET['fecha_ingreso'];
 $hora_ingreso = $_GET['hora_ingreso'];
 $placa = $_GET['placa'];
 $nombre_cliente = $_GET['nombre_cliente'];
 $estado_ticket = 'OCUPADO';
 $estado = '1';
 
 session_start();
 $user_sesion = $_SESSION['usuario_sesion'];

$sentencia= $pdo->prepare("INSERT INTO tb_tickets 
( nombre_cliente, placa, dni, cuviculo, fecha_ingreso,  hora_ingreso, user_sesion, estado_ticket, estado, fyh_creacion) 

VALUES (:nombre_cliente, :placa, :dni, :cuviculo,:fecha_ingreso, :hora_ingreso, :user_sesion, :estado_ticket, :estado, :fyh_creacion);");
$sentencia->bindParam('nombre_cliente', $nombre_cliente);
$sentencia->bindParam('placa', $placa);
$sentencia->bindParam('dni', $dni);
$sentencia->bindParam('cuviculo', $cuviculo);
$sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
$sentencia->bindParam('hora_ingreso', $hora_ingreso);
$sentencia->bindParam('user_sesion', $user_sesion);
$sentencia->bindParam('estado_ticket', $estado_ticket);
$sentencia->bindParam('estado', $estado);
$sentencia->bindParam('fyh_creacion', $fechahora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = 'se registro al ticket de la manera correcta';
    $_SESSION['icono'] = 'success';
    //header('Location:'.$URL.'/categorias');
    
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/view/tickets/generar_ticket.php"
    </script>
    <?php

}else{
    session_start();
    $_SESSION['mensaje'] = 'error los datos no pudieron registrarse';
    $_SESSION['icono'] = 'error';
    //header('Location:'.$URL.'/categorias');
    ?>
    <script>
          location.href = "<?php echo $URL; ?>/view/tickets/generar_ticket.php"
    </script>
    <?php
}

?>
?>