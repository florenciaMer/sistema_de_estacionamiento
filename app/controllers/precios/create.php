<?php

include ('../../config.php');
 $cantidad = $_GET['cantidad'];
 $detalle = $_GET['detalle'];
 $precio = $_GET['precio'];
 $estado = 1;
// echo $nro_espacio .'-'. $estado_espacio .'-'. $obs;

 
 $sentencia= $pdo->prepare("INSERT INTO tb_precios 
 ( cantidad, detalle, precio, estado, fyh_creacion) 
 
 VALUES (:cantidad, :detalle, :precio, :estado, :fyh_creacion);");
 $sentencia->bindParam('cantidad', $cantidad);
 $sentencia->bindParam('detalle', $detalle);
 $sentencia->bindParam('precio', $precio);
 $sentencia->bindParam('estado', $estado);
 $sentencia->bindParam('fyh_creacion', $fechahora);
 
 if ($sentencia->execute()) {
     session_start();
     $_SESSION['mensaje'] = 'se registro el precio de la manera correcta';
     $_SESSION['icono'] = 'success';
     ?>
     <script>
         location.href = "<?php echo $URL; ?>/view/precios/index.php"
     </script>
     <?php
 
 }else{
     session_start();
     $_SESSION['mensaje'] = 'error los datos no pudieron registrarse';
     $_SESSION['icono'] = 'error';
     ?>
     <script>
           location.href = "<?php echo $URL; ?>/view/precios/index.php"
     </script>
     <?php
 }

 ?>