<?php

include ('../../config.php');
 $nombre_usuario = $_GET['nombre_usuario'];
 $email_usuario = $_GET['email_usuario'];
 $password_usuario = $_GET['password_usuario'];
 
$sentencia= $pdo->prepare("INSERT INTO tb_usuarios 
( nombre_usuario, email_usuario, password_usuario, estado, fyh_creacion) 

VALUES (:nombre_usuario, :email_usuario, :password_usuario,:estado,:fyh_creacion);");
$sentencia->bindParam('nombre_usuario', $nombre_usuario);
$sentencia->bindParam('email_usuario', $email_usuario);
$sentencia->bindParam('password_usuario', $password_usuario);
$sentencia->bindParam('estado', $estado);
$sentencia->bindParam('fyh_creacion', $fechahora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = 'se registro al usuario de la manera correcta';
    $_SESSION['icono'] = 'success';
    //header('Location:'.$URL.'/categorias');
    
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/view/roles/asignar.php"
    </script>
    <?php

}else{
    session_start();
    $_SESSION['mensaje'] = 'error los datos no pudieron registrarse';
    $_SESSION['icono'] = 'error';
    //header('Location:'.$URL.'/categorias');
    ?>
    <script>
          location.href = "<?php echo $URL; ?>/view/roles/asignar.php"
    </script>
    <?php
}

?>
?>