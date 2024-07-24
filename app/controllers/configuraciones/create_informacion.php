<?php

include ('../../config.php');
 $nombre_parqueo = $_GET['nombre_parqueo'];
 $actividad_empresa = $_GET['actividad_empresa'];
 $sucursal = $_GET['sucursal'];
 $direccion = $_GET['direccion'];
 $telefono = $_GET['telefono'];
 $zona = $_GET['zona'];
 $ciudad = $_GET['ciudad'];
 $pais = $_GET['pais'];

 
$sentencia= $pdo->prepare("INSERT INTO tb_informaciones 
( nombre_parqueo, actividad_empresa, sucursal, direccion, telefono, zona, ciudad, pais, fyh_creacion) 

VALUES (:nombre_parqueo, :actividad_empresa, :sucursal,:direccion,:telefono, :zona, :ciudad, :pais, :fyh_creacion);");
$sentencia->bindParam('nombre_parqueo', $nombre_parqueo);
$sentencia->bindParam('actividad_empresa', $actividad_empresa);
$sentencia->bindParam('sucursal', $sucursal);
$sentencia->bindParam('direccion', $direccion);
$sentencia->bindParam('telefono', $telefono);
$sentencia->bindParam('zona', $zona);
$sentencia->bindParam('ciudad', $ciudad);
$sentencia->bindParam('pais', $pais);
$sentencia->bindParam('fyh_creacion', $fechahora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = 'se registro al usuario de la manera correcta';
    $_SESSION['icono'] = 'success';
    //header('Location:'.$URL.'/categorias');
    
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/view/configuraciones/informacion.php"
    </script>
    <?php

}else{
    session_start();
    $_SESSION['mensaje'] = 'error los datos no pudieron registrarse';
    $_SESSION['icono'] = 'error';
    //header('Location:'.$URL.'/categorias');
    ?>
    <script>
          location.href = "<?php echo $URL; ?>/view/configuraciones/informacion.php"
    </script>
    <?php
}

?>
?>