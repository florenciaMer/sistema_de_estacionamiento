<?php

include '../../config.php';

$id_parqueo = $_GET['id_parqueo'];
$estado = 0;

$sentencia= $pdo->prepare("UPDATE tb_informaciones SET
 estado=:estado,
 fyh_modificacion=:fyh_modificacion
 WHERE id_inf=:id_parqueo");

 $sentencia->bindParam('estado', $estado);
$sentencia->bindParam('fyh_modificacion', $fechahora);
$sentencia->bindParam('id_parqueo', $id_parqueo);

if($sentencia->execute()){

    session_start();
    $_SESSION['mensaje'] = 'se elimino de la manera correcta';
    $_SESSION['icono'] = 'success';
    

?>
<script> location.href = "<?php echo $URL; ?>/view/configuraciones/informacion.php"</script>
<?php }else{

echo "No Se elimino de la manera correcta";
?>
<script> location.href = "<?php echo $URL; ?>/view/configuraciones/informacion.php"</script>
<?php }
 
?>

