<?php

include('../../config.php');

// Get parameters from the URL
$id_precio = $_GET['id_precio'];
$cantidad = $_GET['cantidad'];
$detalle = $_GET['detalle'];
$precio = $_GET['precio'];
$fechahora = date('Y-m-d H:i:s'); // Assuming you want to capture the current date and time

// Prepare the SQL statement
$sentencia = $pdo->prepare("
    UPDATE tb_precios 
    SET 
        cantidad = :cantidad,
        detalle = :detalle,
        precio = :precio,
        fyh_modificacion = :fyh_modificacion
    WHERE id_precio = :id_precio
");

// Bind the parameters
$sentencia->bindParam(':id_precio', $id_precio);
$sentencia->bindParam(':cantidad', $cantidad);
$sentencia->bindParam(':detalle', $detalle);
$sentencia->bindParam(':precio', $precio);
$sentencia->bindParam(':fyh_modificacion', $fechahora);

// Execute the statement and handle the result
session_start();

if ($sentencia->execute()) {
    $_SESSION['mensaje'] = 'Se actualizó de la manera correcta';
    $_SESSION['icono'] = 'success';
  
} else {
    $_SESSION['mensaje'] = 'Los datos no se pudieron actualizar';
    $_SESSION['icono'] = 'error';
    
}

// Redirect to the prices index page
//header("Location: {$URL}/view/precios/index.php");
?>
     <script>
           location.href = "<?php echo $URL; ?>/view/precios/index.php"
     </script>
     <?php
exit;
?>
