<?php


if (isset($_SESSION['usuario_sesion'])) {
   # code...
   $usuario_sesion = $_SESSION['usuario_sesion'];
}else{
   $_SESSION['usuario_sesion'] = 'florencia mer';
   $usuario_sesion = $_SESSION['usuario_sesion'];
}


$sql_usuarios = "SELECT * FROM tb_usuarios WHERE email_usuario = '$usuario_sesion' and estado = 1";
                    
$query_usuarios_sesion = $pdo->prepare($sql_usuarios);
$query_usuarios_sesion->execute();
$usuarios_sesion = $query_usuarios_sesion->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios_sesion as $datos) {
   $id_usuario_sesion = $datos['id_usuario'];
   $nombre_usuario_sesion = $datos['nombre_usuario'];
   $email_usuario_sesion = $datos['email_usuario']; 
   $rol_usuario_sesion = $datos['id_rol']; 
}


?>