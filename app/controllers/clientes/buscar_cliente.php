<?php
include_once('../../config.php');
$placa = $_GET['placa'];

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
        <label for="staticEmail" class="col-sm-3 col-form-label">Nombre:</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre"value="<?php $nombre;?>" >
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">DNI:</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="dni" value="<?php $dni;?>">
        </div>
    </div>
    <
<?php 
}else{?>
   <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Nombre:</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre"value="<?php echo $nombre;?>" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">DNI:</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="dni" value="<?php echo $dni;?>" disabled>
        </div>
    </div>
<?php }

?>