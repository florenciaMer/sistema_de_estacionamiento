<?php
include_once('../../config.php');

$nombre_usuario = $_POST['nombre_usuario'];
$email_usuario = $_POST['email_usuario'];
$id_usuario = $_POST['id_usuario'];
$id_rol = $_POST['id_rol'];
//echo $nombre_usuario .'-' . $email_usuario .'-' . $rol_usuario;

 //echo $nombre ."-". $email ."-". $password;
 $sentencia= $pdo->prepare("UPDATE tb_usuarios SET

 id_rol=:id_rol,
 fyh_modificacion=:fyh_modificacion
 WHERE id_usuario=:id_usuario");

 $sentencia->bindParam('id_rol', $id_rol);
 $sentencia->bindParam('fyh_modificacion', $fechahora);
 $sentencia->bindParam('id_usuario', $id_usuario);
 
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

?>
