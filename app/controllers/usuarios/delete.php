<?php

include '../../config.php';

$id_usuario = $_GET['id_usuario'];
$estado = 0;
//$sentencia= $pdo->prepare("DELETE FROM tb_usuarios WHERE id_usuario=:id_usuario");

$sentencia= $pdo->prepare("UPDATE tb_usuarios SET
 estado=:estado,
 fyh_modificacion=:fyh_modificacion
 WHERE id_usuario=:id_usuario");

 $sentencia->bindParam('estado', $estado);
$sentencia->bindParam('fyh_modificacion', $fechahora);
$sentencia->bindParam('id_usuario', $id_usuario);
 
if($sentencia->execute()){


session_start();
$_SESSION['mensaje'] = 'se elimino de la manera correcta';
$_SESSION['icono'] = 'success';

?>
<script> location.href = "<?php echo $URL; ?>/view/usuarios/index.php"</script>
<?php }else{

session_start();
$_SESSION['mensaje'] = 'No se elimino de la manera correcta';
$_SESSION['icono'] = 'error';
?>
<script> location.href = "<?php echo $URL; ?>/view/usuarios/index.php"</script>
<?php } ?>

