<?php

include_once('../../config.php');
session_start();

$usuario_user = $_GET['usuario_user'];
$password_user = $_GET['password_user'];

if($usuario_user != ""){
echo "Sin usuario";
}
$sql_usuarios = "SELECT * FROM tb_usuarios 
WHERE email_usuario = '$usuario_user' 
AND password_usuario = '$password_user'
AND estado = 1";

$query_login = $pdo->prepare($sql_usuarios);
$query_login->execute();
$usuarios = $query_login->fetchAll(PDO::FETCH_ASSOC);

$email_tabla ='';
$password_tabla ='';

foreach ($usuarios as  $usuario) {
    $id_tabla =  $usuario['id_usuario'];
    $email_tabla = $usuario['email_usuario'];
    $password_tabla = $usuario['password_usuario'];
   
}
if ( ($usuario_user == $email_tabla) && ($password_user == $password_tabla)) {
    session_start();
    $_SESSION['usuario_sesion'] = $email_tabla;
      
  ?>
    <div class="alert alert-success" role="alert">
        Usuario correcto
    </div>
    <script>
        location.href= "principal.php";
    </script>
<?

}else{ ?>
    <div class="alert alert-danger" role="alert">
    Error al introducir sus datos 
    <script>
        $('#password').val("");
        $('#password').focus();

    </script>
</div>

<?php }
?>