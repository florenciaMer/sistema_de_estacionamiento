
<?php
//include_once('../../config.php');
$sql_tickets = "SELECT * FROM tb_tickets WHERE estado_ticket = 'OCUPADO'";
                    
$query_tickets = $pdo->prepare($sql_tickets);
$query_tickets->execute();
$tickets_datos = $query_tickets->fetchAll(PDO::FETCH_ASSOC);

?>