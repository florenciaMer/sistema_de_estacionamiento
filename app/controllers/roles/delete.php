<?php

include '../../config.php';

$id_rol = $_GET['id_rol'];
$estado = 0;
//$sentencia= $pdo->prepare("DELETE FROM tb_usuarios WHERE id_usuario=:id_usuario");

$sentencia= $pdo->prepare("SELECT * FROM  tb_usuarios WHERE id_rol = $id_rol");
$sentencia->execute();
$cuenta = $sentencia->rowCount();



if ($cuenta >0) {
    session_start();
    $_SESSION['mensaje'] = 'No se puede eliminar el rol porque existen usuarios asociados';
    $_SESSION['icono'] = 'error';
  
}else{


$sentencia= $pdo->prepare("UPDATE tb_roles SET
 estado=:estado,
 fyh_modificacion=:fyh_modificacion
 WHERE id_rol=:id_rol");

 $sentencia->bindParam('estado', $estado);
$sentencia->bindParam('fyh_modificacion', $fechahora);
$sentencia->bindParam('id_rol', $id_rol);
 
if($sentencia->execute()){

    session_start();
    $_SESSION['mensaje'] = 'se elimino de la manera correcta';
    $_SESSION['icono'] = 'success';
    

?>
<script> location.href = "<?php echo $URL; ?>/view/roles/index.php"</script>
<?php }else{

echo "No Se elimino de la manera correcta";
?>
<script> location.href = "<?php echo $URL; ?>/view/roles/index.php"</script>
<?php }
 
}?>

