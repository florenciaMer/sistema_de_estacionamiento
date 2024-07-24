<?php
//include_once('../../config.php');
$sql_informacion = "SELECT * FROM tb_informaciones WHERE estado = 1";
                    
$query_informacion = $pdo->prepare($sql_informacion);
$query_informacion->execute();
$informacion_datos = $query_informacion->fetchAll(PDO::FETCH_ASSOC);

?>