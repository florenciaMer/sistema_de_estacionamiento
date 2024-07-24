<?php

include ('../../config.php');
 $id_usuario = $_GET['id_usuario'];
 $nombre = $_GET['nombre_usuario'];
 $email = $_GET['email_usuario'];
 $password_user = $_GET['password_usuario'];
 
 //echo $nombre ."-". $email ."-". $password;
 $sentencia= $pdo->prepare("UPDATE tb_usuarios SET
 nombre_usuario=:nombre, 
 email_usuario=:email,
 password_usuario=:password_user,
 fyh_modificacion=:fyh_modificacion
 WHERE id_usuario=:id_usuario");

 $sentencia->bindParam('nombre', $nombre);
 $sentencia->bindParam('email', $email);
 $sentencia->bindParam('password_user', $password_user);
 $sentencia->bindParam('fyh_modificacion', $fechahora);
 $sentencia->bindParam('id_usuario', $id_usuario);
 
 if($sentencia->execute()){

    session_start();
    $_SESSION['mensaje'] = 'se actualizo de la manera correcta';
    $_SESSION['icono'] = 'success';

    ?>
    <script> location.href = "<?php echo $URL; ?>/view/usuarios/index.php"</script>
 <?php }else{
     session_start();
     $_SESSION['mensaje'] = 'Los datos no se pudieron actualizar';
     $_SESSION['icono'] = 'error';
     
     ?>
     <script> location.href = "<?php echo $URL; ?>/view/usuarios/index.php"</script>
 <?php }?>

 
 
 ?>
 <script>
    
     location.href = "<?php echo $URL; ?>/view/usuarios/index.php"

 </script>
 <?php
 ?>