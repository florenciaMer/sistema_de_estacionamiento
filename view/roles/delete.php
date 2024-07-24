<?php

include_once('../../app/config.php');
include_once('../../layout/head.php');
include_once('../../app/controllers/usuarios/datos_usuario_sesion.php');
include_once('../../app/controllers/roles/listado_roles.php');


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

                foreach ($roles_datos as $rol) {
                   if($rol['id_rol'] == $id_get){
                    $nombre_rol = $rol['nombre_rol'];
                    $estado_rol = $rol['estado'];
                   }
                }
                ?>


                <div class="row">
                   <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-danger" style="color:white">
                            <h3 class="card-title">Está seguro que desea eliminar al rol? <?php echo $nombre_rol?></h3> 
                        </div>
                        
                        <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre Rol</label>
                                    <input type="text" id="id_rol" name="id_rol" class="form-control" value="<?php echo $id_get?>" hidden>
                                    <input type="text" id="nombre_rol" name="nombre" class="form-control" value="<?php echo $nombre_rol?>">
                                </div>
                           
                                <div class="form-group">
                                    <label for="email">Estado</label>
                                    <input type="text" name="email_rol" id="estado" class="form-control"  value="<?php echo $estado?>">
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
 
 let id_rol =  $('#id_rol').val();
 
   let url = "../../app/controllers/roles/delete.php";
        $.get(url, {id_rol:id_rol}, function(datos){
         $('#respuesta_delete').html(datos);
        });
 });
</script>
