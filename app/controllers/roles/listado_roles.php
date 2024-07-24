
<?php
//include_once('../../config.php');
$sql_roles = "SELECT * FROM tb_roles WHERE estado = 1";
                    
$query_roles = $pdo->prepare($sql_roles);
$query_roles->execute();
$roles_datos = $query_roles->fetchAll(PDO::FETCH_ASSOC);

?>