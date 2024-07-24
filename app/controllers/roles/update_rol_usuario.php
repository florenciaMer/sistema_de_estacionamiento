<?php

include ('../../config.php');
 $id_usuario = $_GET['id_usuario'];
 $id_rol = $_GET['id_rol'];

 
 //echo $id_usuario ."-". $id_rol ;
 $sentencia= $pdo->prepare("UPDATE tb_usuarios SET
 id_usuario=:id_usuario, 
 id_rol=:id_rol,
 fyh_modificacion=:fyh_modificacion
 WHERE id_usuario=:id_usuario");

 $sentencia->bindParam('id_usuario', $id_usuario);
 $sentencia->bindParam('id_rol', $id_rol);
 $sentencia->bindParam('fyh_modificacion', $fechahora);
 
 if($sentencia->execute()){

    session_start();
    $_SESSION['mensaje'] = 'se actualizo de la manera correcta';
    $_SESSION['icono'] = 'success';

    ?>
    <script> location.href = "<?php echo $URL; ?>/view/roles/asignar.php"</script>
 <?php }else{
     session_start();
     $_SESSION['mensaje'] = 'Los datos no se pudieron actualizar';
     $_SESSION['icono'] = 'error';
     
     ?>
     <script> location.href = "<?php echo $URL; ?>/view/roles/asignar.php"</script>
 <?php }?>

 

 <script>
    
     location.href = "<?php echo $URL; ?>/view/roles/asignar.php"

 </script>
 <?php
 ?>