<?php

include_once(dirname(__DIR__)."../../config.php");



$usuario_user = $_GET['usuario_user'];
$password_user = $_GET['password_user'];



//echo $usuario." - ".$password_user;
$email_tabla = ''; $password_tabla = '';

$query_login = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email_usuario = '$usuario_user' AND password_usuario = '$password_user' AND estado = '1' ");
$query_login->execute();
$usuarios = $query_login->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios as $usuario){
    $email_tabla = $usuario['email_usuario'];
    $password_tabla = $usuario['password_usuario'];
}

if(($usuario_user == $email_tabla)&&($password_user == $password_tabla)){
 
    session_start();
    $_SESSION['usuario_sesion'] = $email_tabla;
    
    ?>
        <div class="alert alert-success" role="alert">
            Usuario Correcto
        </div>
        <script>location.href = "principal.php";</script>
        <?php
    
    
    ?>

    <?php
   
}else{
    ?>
    <div class="alert alert-danger" role="alert">
        Error al introducir sus datos
    </div>
    <script>$('#password').val("");$('#password').focus();</script>
    <?php
}