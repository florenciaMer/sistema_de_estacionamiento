<?php

include ('../../config.php');
 $nro_espacio = $_GET['nro_cuviculo'];
 $estado_espacio = 'OCUPADO';

 
 //echo $nombre ."-". $email ."-". $password;
 $sentencia= $pdo->prepare("UPDATE tb_mapeos SET
 nro_espacio=:nro_espacio, 
 estado_espacio=:estado_espacio,
 fyh_actualizacion=:fyh_actualizacion
 WHERE nro_espacio=:nro_espacio");

 $sentencia->bindParam('nro_espacio', $nro_espacio);
 $sentencia->bindParam('estado_espacio', $estado_espacio);
 $sentencia->bindParam('fyh_actualizacion', $fechahora);
 
 if($sentencia->execute()){

    session_start();
    $_SESSION['mensaje'] = 'se actualizo de la manera correcta';
    $_SESSION['icono'] = 'success';

    ?>
    <script> location.href = "<?php echo $URL; ?>/view/parqueo/mapeo_de_vehiculos.php"</script>
 <?php }else{
     session_start();
     $_SESSION['mensaje'] = 'Los datos no se pudieron actualizar';
     $_SESSION['icono'] = 'error';
     
     ?>
   <!--  <script> location.href = "<?php echo $URL; ?>/view/parqueo/mapeo_de_vehiculos.php"</script>-->
 <?php }?>

 

 <?php
 ?>