<?php

include_once('../../app/config.php');
include_once('../../layout/head.php');


?>


<body class="hold-transition sidebar-mini">

<div class="wrapper">

  <!-- Navbar -->
  <?php include_once('../../layout/menu.php');?>
   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once('../../layout/sidebar.php');?>
  <div class="content-wrapper">
    <div class="container">
        <br>
            <h2 class="m-2">Edicion de los datos del cliente</h2>
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Datos del Cliente</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                </div>

                <?php 
                        $id_cliente_get = $_GET['id_cliente'];
                        $sql_cliente = "SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente_get'";
                         $query_cliente = $pdo->prepare($sql_cliente);
                         $query_cliente->execute();
                         $cliente_datos = $query_cliente->fetchAll(PDO::FETCH_ASSOC);
                         $contador_cliente =0;
                         foreach ($cliente_datos as $dato) {
                         $contador_cliente++;
                            $id_cliente = $dato['id_cliente'];
                            $nombre_cliente = $dato['nombre_cliente'];
                            $dni = $dato['dni'];
                            $placa_auto = $dato['placa_auto'];
                        
                 }?>

                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nombre del Cliente</label>
                            <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente"value="<?php echo $nombre_cliente;?>" >
                            <input type="text" class="form-control" id="id_cliente" name="id_cliente"value="<?php echo $id_cliente;?>" >
                        </div>
                    </div>
                    

                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">DNI del Cliente</label>
                            <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $dni;?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Placa</label>
                            <input type="text" class="form-control" id="placa" name="placa" value="<?php echo $placa_auto;?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="index.php" class="btn btn-default">Cancelar</a>
                            <button class="btn btn-success float-right" id="btn-registrar">Actualizar</button>
                        </div>
                    </div>
                    <div id="respuesta_update"></div>
                  </div>
                 
                </div>
            </div>
        </div>         
  </div>
</div>
</body>
</html>

<script>
  $('#btn-registrar').click(function(){
 
 let id_cliente =  $('#id_cliente').val();
 let nombre_cliente =  $('#nombre_cliente').val();
 let dni =  $('#dni').val();
 let placa =  $('#placa').val();
 let obs =  $('#obs').val();

 
 if (nombre_cliente == "") {
     alert('debe completar el nombre del cliente');
   $('#nombre_cliente').focus();
 } else  if (placa == "") {
     alert('debe completar la placa');
   $('#placa').focus();
 } else  if (dni == "") {
     alert('debe completar el dni del cliente');
   $('#dni').focus();
 }
else{
   let url = "../../app/controllers/clientes/update.php";
        $.get(url, {id_cliente: id_cliente, nombre_cliente:nombre_cliente, placa:placa,dni:dni }, function(datos){
         $('#respuesta_update').html(datos);
        });
   }
 });
</script>


