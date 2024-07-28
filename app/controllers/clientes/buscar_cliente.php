<?php
include_once('../../config.php');
$placa = $_GET['placa'];
$id_map = $_GET['id_map'];

//convierte la variable a mayuscula
$placa = strtoupper($placa);

$id_cliente = '';
$nombre = '';
$dni = '';

$sql_cliente_placa = "SELECT * FROM tb_clientes WHERE estado_cliente = 1 AND placa_auto ='$placa'";
                    
$query_cliente_placa = $pdo->prepare($sql_cliente_placa);
$query_cliente_placa->execute();
$cliente_placa_datos = $query_cliente_placa->fetchAll(PDO::FETCH_ASSOC);

foreach ($cliente_placa_datos as $cliente) {
    $id_cliente = $cliente['id_cliente'];
    $nombre = $cliente['nombre_cliente'];
    $dni = $cliente['dni'];
    $placa = $cliente['placa_auto'];
}

if ($nombre == "") {
   echo "El cliente es nuevo";
   ?>
   <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Nombre:<span style="color: red;"><b>*</b></span></label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre_cliente<?php echo $id_map;?>" value="<?php echo $nombre;?>" >
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">DNI:<span style="color: red;"><b>*</b></span></label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="dni<?php echo $id_map;?>" value="<?php echo $dni;?>">
        <input type="text" class="form-control" id="id_cliente<?php echo $id_map;?>" value="<?php echo $id_map;?>" hidden >
        </div>
    </div>
    
<?php 
}else{
echo "el cliente ya existe"?>
   <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Nombre:</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre_cliente<?php echo $id_map;?>"value="<?php echo $nombre;?>" disabled>
        <input type="text" class="form-control" id="id_cliente<?php echo $id_map;?>" value="<?php echo $id_cliente;?>" hidden>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">DNI:</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="dni<?php echo $id_map;?>" value="<?php echo $dni;?>" disabled>
        </div>
    </div>
<?php }


//busca la placa en tb_tickets

$query_ticket = "SELECT * FROM tb_tickets WHERE  placa ='$placa' AND estado_ticket ='OCUPADO' and estado = '1'";
                    
$query_datos_tickets = $pdo->prepare($query_ticket);
$query_datos_tickets->execute();
$datos_tickets = $query_datos_tickets->fetchAll(PDO::FETCH_ASSOC);
$contador_ticket = 0;
foreach ($datos_tickets as $key => $value) {
    $contador_ticket = $contador_ticket+1;
}

if($contador_ticket == 0) {
   echo "No se ha encontrado ningun cliente";
   ?>
    <script>
        $('#btn-imprimir-ticket<?php echo $id_map?>').removeAttr('disabled');
    </script>
   <?php
}else{
   
    ?>
    <div class="alert alert-danger">
        Este vehiculo ya se encuentra dentro del parqueo
    </div>
    <script>
        $('#btn-imprimir-ticket<?php echo $id_map?>').attr('disabled', 'disabled');
    </script>
<?php }
?>