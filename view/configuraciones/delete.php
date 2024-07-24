<?php

include_once('../../app/config.php');
include_once('../../layout/head.php');
include_once('../../app/controllers/usuarios/datos_usuario_sesion.php');
include_once('../../app/controllers/configuraciones/listado_de_informacion.php');


 /* if (isset($_SESSION['mensaje'])) {
    $respuesta = $_SESSION['mensaje'];
    $icon = $_SESSION['icono'];
    echo $icon;
    ?>
    
  <script>
      Swal.fire({
      position: "top-end",
      icon: '<?php echo $icon ?>',
      title: '<?php echo $respuesta ?>',
      showConfirmButton: false,
      timer: 1500
   });
  <?php session_destroy();?>
  </script>
  <?php
  }*/
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
                <?php $id_get = $_GET['id'];

                foreach ($informacion_datos as $info) {
                   if($info['id_inf'] == $id_get){
                    $nombre_parqueo = $info['nombre_parqueo'];
                    $actividad_empresa = $info['actividad_empresa'];
                    $sucursal = $info['sucursal'];
                    $direccion = $info['direccion'];
                    $zona = $info['zona'];
                    $telefono = $info['telefono'];
                    $ciudad = $info['ciudad'];
                    $pais = $info['pais'];
                    $estado = $info['estado'];
                    
                   }
                }
                ?>


                <div class="row">
                   <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-danger" style="color:white">
                            <h3 class="card-title">Está seguro que desea eliminar al parqueo? <?php echo $nombre_parqueo?></h3> 
                        </div>
                        
                        <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre Parqueo</label>
                                    <input type="text" id="id_parqueo" name="id_parqueo" class="form-control" value="<?php echo $id_get?>" hidden>
                                    <input type="text" id="nombre_parqueo" name="nombre_parqueo" class="form-control" value="<?php echo $nombre_parqueo?>">
                                </div>
                           
                                <div class="form-group">
                                    <label for="email">Actividad</label>
                                    <input type="text" name="actividad_empresa" id="actividad_empresa" class="form-control"  value="<?php echo $actividad_empresa?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Sucursal</label>
                                    <input type="text" name="sucursal" id="sucursal" class="form-control"  value="<?php echo $sucursal?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Direccion</label>
                                    <input type="text" name="direccion" id="direccion" class="form-control"  value="<?php echo $direccion?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Zona</label>
                                    <input type="text" name="zona" id="zona" class="form-control"  value="<?php echo $zona?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Telefono</label>
                                    <input type="text" name="telefono" id="telefono" class="form-control"  value="<?php echo $telefono?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Ciudad</label>
                                    <input type="text" name="ciudad" id="ciudad" class="form-control"  value="<?php echo $ciudad?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Pais</label>
                                    <input type="text" name="pais" id="pais" class="form-control"  value="<?php echo $pais?>">
                                </div>
                                
                           
                                <div class="form-group">
                                    <a href="index.php" class="btn btn-default">Cancelar</a>
                                    <button class="btn btn-danger" id="btn-delete">Confirmar</button>
                                </div>
                        </div> 
                    </div>
                 </div>
                 <div id="respuesta_delete"></div>
 </div>
                    <div class="col-md-6">
                        
                    </div>
                    <div id="respuesta_delete"></div>
                </div>
            </div>
    </div>
  </div>
</body>
</html>

<script>
  $('#btn-delete').click(function(){
 
 let id_parqueo =  $('#id_parqueo').val();


 
   let url = "../../app/controllers/configuraciones/delete.php";
        $.get(url, {id_parqueo:id_parqueo}, function(datos){
         $('#respuesta_delete').html(datos);
        });
 });
</script>
