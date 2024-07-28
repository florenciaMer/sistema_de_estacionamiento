<?php

include ('../../config.php');
 $nombre_cliente = $_GET['nombre_cliente'];
 $dni = $_GET['dni'];
 $placa_auto = $_GET['placa'];
 $estado_cliente = '1';
//busca si el cliente ya existe
$contador_cliente = 0;

 $query_cliente = "SELECT * FROM tb_clientes WHERE  placa_auto ='$placa_auto' AND estado_cliente ='1'";
                    
$query_datos_clientes = $pdo->prepare($query_cliente);
$query_datos_clientes->execute();
$datos_clientes = $query_datos_clientes->fetchAll(PDO::FETCH_ASSOC);

foreach ($datos_clientes as $key => $value) {
    $contador_cliente = $contador_cliente+1;
}

if($contador_cliente == 0) {
   echo "No se ha encontrado ningun cliente";
   $sentencia= $pdo->prepare("INSERT INTO tb_clientes 
( nombre_cliente, dni, placa_auto, estado_cliente, fyh_creacion) 

VALUES (:nombre_cliente, :dni, :placa_auto, :estado_cliente ,:fyh_creacion);");
$sentencia->bindParam('nombre_cliente', $nombre_cliente);
$sentencia->bindParam('dni', $dni);
$sentencia->bindParam('placa_auto', $placa_auto);
$sentencia->bindParam('estado_cliente', $estado_cliente);
$sentencia->bindParam('fyh_creacion', $fechahora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = 'se registro el cliente de la manera correcta';
    $_SESSION['icono'] = 'success';
    //header('Location:'.$URL.'/categorias');
    
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/view/parqueo/mapeo_de_vehiculos.php"
    </script>
    <?php

   
}else{
   
    ?>
    <div class="alert alert-danger">
        Este cliente ya se encuentra registrado dentro del parqueo
    </div>
  
<?php

}


}else{
    session_start();
    $_SESSION['mensaje'] = 'error los datos no pudieron registrarse';
    $_SESSION['icono'] = 'error';
    //header('Location:'.$URL.'/categorias');
    $_SESSION['mensaje'] = 'No se pudo registrar el rol de la manera correcta';
    ?>
    <script>
          location.href = "<?php echo $URL; ?>/view/roles/index.php"
    </script>
    <?php
}

?>