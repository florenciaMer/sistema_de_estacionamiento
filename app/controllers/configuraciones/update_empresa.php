

 <?php

include ('../../config.php');

$id_inf = $_GET['id_parqueo'];
 $nombre_parqueo = $_GET['nombre_parqueo'];
 $actividad_empresa = $_GET['actividad_empresa'];
 $sucursal = $_GET['sucursal'];
 $direccion = $_GET['direccion'];
 $telefono = $_GET['telefono'];
 $zona = $_GET['zona'];
 $ciudad = $_GET['ciudad'];
 $pais = $_GET['pais'];

 
 //echo $id_usuario ."-". $id_rol ;
 $sentencia= $pdo->prepare("UPDATE tb_informaciones SET
 nombre_parqueo=:nombre_parqueo, 
 actividad_empresa=:actividad_empresa,
 sucursal=:sucursal,
 direccion=:direccion,
 telefono=:telefono,
 zona=:zona,
 ciudad=:ciudad,
 pais=:pais,
 fyh_modificacion=:fyh_modificacion
 WHERE id_inf=:id_inf");

 $sentencia->bindParam('id_inf', $id_inf);
 $sentencia->bindParam('nombre_parqueo', $nombre_parqueo);
 $sentencia->bindParam('actividad_empresa', $actividad_empresa);
 $sentencia->bindParam('sucursal', $sucursal);
 $sentencia->bindParam('direccion', $direccion);
 $sentencia->bindParam('telefono', $telefono);
 $sentencia->bindParam('zona', $zona);
 $sentencia->bindParam('ciudad', $ciudad);
 $sentencia->bindParam('pais', $pais);
 $sentencia->bindParam('fyh_modificacion', $fechahora);
 
 if($sentencia->execute()){

    session_start();
    $_SESSION['mensaje'] = 'se actualizo de la manera correcta';
    $_SESSION['icono'] = 'success';

    ?>
    <script> location.href = "<?php echo $URL; ?>/view/configuraciones/informacion.php"</script>
 <?php }else{
     session_start();
     $_SESSION['mensaje'] = 'Los datos no se pudieron actualizar';
     $_SESSION['icono'] = 'error';
     
     ?>
     <script> location.href = "<?php echo $URL; ?>/view/configuraciones/informacion.php"</script>
 <?php }?>

 

 
 <?php
 ?>