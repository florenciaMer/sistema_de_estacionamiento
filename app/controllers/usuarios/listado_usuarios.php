

<?php
//include_once('../../config.php');
$sql_usuarios = "SELECT * FROM tb_usuarios WHERE estado = 1";
                    
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

?>