<?php

include ('../../config.php');
 $nro_espacio = $_GET['nro_espacio'];
 $estado_espacio = $_GET['estado_espacio'];
 $obs = $_GET['obs'];
 $estado = 1;
// echo $nro_espacio .'-'. $estado_espacio .'-'. $obs;

 $sentencia= $pdo->prepare("SELECT * FROM  tb_mapeos WHERE nro_espacio = $nro_espacio");
 $sentencia->execute();
 $cuenta = $sentencia->rowCount();
 
 
 
 if ($cuenta ==0) {

 $sentencia= $pdo->prepare("INSERT INTO tb_mapeos 
 ( nro_espacio, estado_espacio, obs, estado, fyh_creacion) 
 
 VALUES (:nro_espacio, :estado_espacio, :obs, :estado, :fyh_creacion);");
 $sentencia->bindParam('nro_espacio', $nro_espacio);
 $sentencia->bindParam('estado_espacio', $estado_espacio);
 $sentencia->bindParam('obs', $obs);
 $sentencia->bindParam('estado', $estado);
 $sentencia->bindParam('fyh_creacion', $fechahora);
 
 if ($sentencia->execute()) {
     session_start();
     $_SESSION['mensaje'] = 'se registro el parqueo de la manera correcta';
     $_SESSION['icono'] = 'success';
     //header('Location:'.$URL.'/categorias');
     
     ?>
     <script>
         location.href = "<?php echo $URL; ?>/view/parqueo/mapeo_de_vehiculos.php"
     </script>
     <?php
 
 }else{
     session_start();
     $_SESSION['mensaje'] = 'error los datos no pudieron registrarse';
     $_SESSION['icono'] = 'error';
     //header('Location:'.$URL.'/categorias');
     ?>
     <script>
           location.href = "<?php echo $URL; ?>/view/parqueo/mapeo_de_vehiculos.php"
     </script>
     <?php
 }
}else{
    session_start();
    $_SESSION['mensaje'] = 'error los datos no pudieron registrarse, ese espacio ya esta asignado a otro vehiculo';
    $_SESSION['icono'] = 'error';
    //header('Location:'.$URL.'/categorias');
    ?>
    <script>
          location.href = "<?php echo $URL; ?>/view/parqueo/mapeo_de_vehiculos.php"
    </script>
    <?php
}
 ?>