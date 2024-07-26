<?php

include ('../../config.php');
 $nombre_cliente = $_GET['nombre_cliente'];
 $dni = $_GET['dni'];
 $placa_auto = $_GET['placa'];
 
$sentencia= $pdo->prepare("INSERT INTO tb_clientes 
( nombre_cliente, dni, placa_auto, fyh_creacion) 

VALUES (:nombre_cliente, :dni, :placa_auto, :fyh_creacion);");
$sentencia->bindParam('nombre_cliente', $nombre_cliente);
$sentencia->bindParam('dni', $dni);
$sentencia->bindParam('placa_auto', $placa_auto);
$sentencia->bindParam('fyh_creacion', $fechahora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = 'se registro el cliente de la manera correcta';
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
    $_SESSION['mensaje'] = 'No se pudo registrar el rol de la manera correcta';
    ?>
    <script>
          location.href = "<?php echo $URL; ?>/view/roles/index.php"
    </script>
    <?php
}

?>