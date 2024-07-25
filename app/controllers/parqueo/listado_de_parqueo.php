<?php

include_once(dirname(__DIR__)."../../config.php");
//include_once('../../config.php');

$sql_parqueo = "SELECT * FROM tb_mapeos WHERE estado = 1";
                    
$query_parqueo = $pdo->prepare($sql_parqueo);
$query_parqueo->execute();
$parqueo_datos = $query_parqueo->fetchAll(PDO::FETCH_ASSOC);

?>