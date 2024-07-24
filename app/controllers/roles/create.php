<?php

include ('../../config.php');
 $nombre_rol = $_GET['nombre_rol'];
 $estado = $_GET['estado'];
 
$sentencia= $pdo->prepare("INSERT INTO tb_roles 
( nombre_rol, estado, fyh_creacion) 

VALUES (:nombre_rol, :estado, :fyh_creacion);");
$sentencia->bindParam('nombre_rol', $nombre_rol);
$sentencia->bindParam('estado', $estado);
$sentencia->bindParam('fyh_creacion', $fechahora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = 'se registro el rol de la manera correcta';
    $_SESSION['icono'] = 'success';
    //header('Location:'.$URL.'/categorias');
    
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/view/roles/index.php"
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
?>