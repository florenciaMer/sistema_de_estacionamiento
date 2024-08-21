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
  <?php include_once('../../layout/sidebar.php');
  
$id_precio_get = $_GET['id_precio'];
$sql_precio = "SELECT * FROM tb_precios WHERE id_precio = '$id_precio_get'";
                    
$query_precio = $pdo->prepare($sql_precio);
$query_precio->execute();
$precio_datos = $query_precio->fetchAll(PDO::FETCH_ASSOC);

foreach ($precio_datos as $dato) {
    $cantidad = $dato['cantidad'];
    $detalle = $dato['detalle'];
    $precio = $dato['precio'];
}
  ?>
  <div class="content-wrapper">
    <div class="container">
        <br>
            <h2 class="m-2">Actualizar un Precio</h2>
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Complete los campos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad" value="<?php echo $cantidad?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cantidad">Detalle</label>
                                <select class="form-control" id="detalle">
                                    <?php if ($detalle == "Horas") {?>
                                        <option value="horas">Horas</option>
                                        <option value="dias">Días</option>
                                   <?php }else{?>
                                        <option value="dias">Días</option>
                                        <option value="horas">Horas</option>
                                        <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cantidad">Precio</label>
                                <input type="number" class="form-control" id="precio" value="<?php echo $precio?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="index.php" class="btn btn-default">Cancelar</a>
                            <a href="" id="btn-update-precio" class="btn btn-primary">Guardar</a>
                        </div>
                    </div>
                    <div id="respuesta_update"></div>
                    <script>
                        $('#btn-update-precio').click(function(){
                            var id_precio = <?php echo $id_precio_get;?>;
                            var cantidad = $('#cantidad').val();
                            var detalle = $('#detalle').val();
                            var precio = $('#precio').val();
                            
                           if(cantidad == ""){
                            alert("Debe completar la cantidad");
                            $('#cantidad').focus();
                           
                           }else if(precio == ""){
                            alert("Debe completar el precio");
                            $('#precio').focus();
                           }else{
                            let url = "../../app/controllers/precios/update.php";
                                $.get(url, {id_precio:id_precio, cantidad:cantidad, detalle:detalle, precio:precio}, function(datos){
                                $('#respuesta_update').html(datos);
                                });
                           }
                        })
                    </script>
                </div>
            </div>
        </div>         
  </div>
</div>
</body>
</html>




