<?php

include ('../../config.php');
 $id_cliente = $_GET['id_cliente'];
 $nombre_cliente = $_GET['nombre_cliente'];
 $placa_auto = $_GET['placa'];
 $dni = $_GET['dni'];

 
 //echo $id_usuario ."-". $id_rol ;
 $sentencia= $pdo->prepare("UPDATE tb_clientes SET
 id_cliente=:id_cliente, 
 nombre_cliente=:nombre_cliente, 
 dni=:dni,
 placa_auto=:placa_auto, 
 fyh_modificacion=:fyh_modificacion
 WHERE id_cliente=:id_cliente");

 $sentencia->bindParam('id_cliente', $id_cliente);
 $sentencia->bindParam('nombre_cliente', $nombre_cliente);
 $sentencia->bindParam('dni', $dni);
 $sentencia->bindParam('placa_auto', $placa_auto);
 $sentencia->bindParam('fyh_modificacion', $fechahora);
 
 if($sentencia->execute()){

    session_start();
    $_SESSION['mensaje'] = 'se actualizo de la manera correcta';
    $_SESSION['icono'] = 'success';

    ?>
    <script> location.href = "<?php echo $URL; ?>/view/clientes/index.php"</script>
 <?php }else{
     session_start();
     $_SESSION['mensaje'] = 'Los datos no se pudieron actualizar';
     $_SESSION['icono'] = 'error';
     
     ?>
     <script> location.href = "<?php echo $URL; ?>/view/clientes/index.php"</script>
 <?php }?>

 

 
 <?php
 ?>