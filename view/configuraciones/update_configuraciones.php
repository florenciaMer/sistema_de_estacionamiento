<?php

include_once('../../app/config.php');
include_once('../../layout/head.php');
include_once('../../app/controllers/usuarios/datos_usuario_sesion.php');
include_once('../../app/controllers/configuraciones/listado_de_informacion.php')
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
            <div class="container">
                <?php 
                    
                    $id_parqueo = $_GET['id'];
                foreach ($informacion_datos as $info) {
                    if ($info['id_inf'] == $id_parqueo) {
                  
                        $nombre_parqueo = $info['nombre_parqueo'];
                        $actividad_empresa  = $info['actividad_empresa'];
                        $sucursal = $info['sucursal'];
                        $direccion = $info['direccion'];
                        $telefono = $info['telefono'];
                        $zona = $info['zona'];
                        $ciudad = $info['ciudad'];
                        $pais = $info['pais'];
               
                   }
                }
                ?>

                <div class="row">
                   <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-success" style="color:white">
                            <p class="h4">Actualizar rol a una Empresa</p> 
                        </div>
                        <div class="card-body" style="display: block;">
                    <div class="row">
                        <input type="text" id="id_parqueo" value="<?php echo $id_parqueo ?>">
                        <div class="col-md-5">
                            <label>Nombre del Parqueo</label>
                            <input type="text" class="form-control" id="nombre_parqueo" name="nombre_parqueo" value="<?php echo $nombre_parqueo?>">
                        </div>
                        <div class="col-md-5">
                            <label>Actividad de la Empresa</label>
                            <input type="text" class="form-control" id="actividad_empresa" name="actividad_empresa" value="<?php echo $actividad_empresa?>">
                        </div>
                        <div class="col-md-2">
                            <label>Sucursal</label>
                            <input type="text" class="form-control" id="sucursal" name="sucursal" value="<?php echo $sucursal?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion?>">
                        </div>
                        <div class="col-md-6">
                            <label>Zona</label>
                            <input type="text" class="form-control" id="zona" name="zona" value="<?php echo $zona?>">
                        </div>
                        <div class="col-md-4">
                            <label>Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono"value="<?php echo $telefono?>">
                        </div>
                        <div class="col-md-4">
                            <label>Ciudad</label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad"value="<?php echo $ciudad?>">
                        </div>
                        <div class="col-md-4">
                            <label>Pais</label>
                            <input type="text" class="form-control" id="pais" name="pais"value="<?php echo $pais?>">
                        </div>
                    </div>
                    

                                

                           
                                <div class="form-group">
                                    <a href="" class="btn btn-default">Cancelar</a>
                                    <button class="btn btn-success" id="btn_actualizar_info">Actualizar</button>
                                </div>
                        </div> 
                    </div>
                 </div>
                 <div id="respuesta_editar"></div>
 </div>
                    <div class="col-md-6">
                        
                    </div>
                 
                </div>
            </div>
    </div>
  </div>
</body>
</html>

<script>
    $('#btn_actualizar_info').click(function(){

    let id_parqueo = $('#id_parqueo').val();
    let nombre_parqueo =  $('#nombre_parqueo').val();
    let actividad_empresa =  $('#actividad_empresa').val();
    let sucursal =  $('#sucursal').val();
    let direccion =  $('#direccion').val();
    let zona =  $('#zona').val();
    let telefono =  $('#telefono').val();
    let ciudad =  $('#ciudad').val();
    let pais =  $('#pais').val();

    let url = "../../app/controllers/configuraciones/update_empresa.php";
        $.get(url, {id_parqueo:id_parqueo, nombre_parqueo:nombre_parqueo, actividad_empresa:actividad_empresa,
            sucursal:sucursal, direccion:direccion, zona:zona, telefono:telefono,ciudad:ciudad,pais:pais
         }, function(datos){
        $('#respuesta_editar').html(datos);
        });
    });                       
</script>
