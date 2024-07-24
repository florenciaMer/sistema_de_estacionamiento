<?php

include_once('../../app/config.php');
include_once('../../layout/head.php');
include_once('../../app/controllers/usuarios/datos_usuario_sesion.php');
include_once('../../app/controllers/usuarios/listado_usuarios.php');
include_once('../../app/controllers/roles/listado_roles.php');
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
                    $id_usuario_get = $_GET['id_usuario'];
                    $id_rol_get = $_GET['id_rol'];
              
                foreach ($usuarios_datos as $usuario) {
                   if($usuario['id_usuario'] == $id_usuario_get){
                    $nombre = $usuario['nombre_usuario'];
                    $email = $usuario['email_usuario'];
               
                   }
                }
                ?>


                <div class="row">
                   <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-success" style="color:white">
                            <p class="h4">Actualizar rol a un Usuario</p> 
                        </div>
                        <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $id_usuario_get?>" hidden>
                                    <input type="text" id="nombre_usuario" name="nombre" class="form-control" value="<?php echo $nombre?>" disabled>
                                </div>
                           
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email_usuario" id="email_usuario" class="form-control"  value="<?php echo $email?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="email">Rol</label>
                                    <select class="form-control" id="id_rol" name="id_rol">
                                    <?php foreach ($roles_datos as $rol) { 
                                        $nombre_rol = $rol['nombre_rol']
                                        ?>

                                        <option value="<?php echo $id_rol_get; ?>"
                                            <?php if ($rol['id_rol'] == $id_rol_get) {?> selected="selected"<?php } ?>>
                                            <?php echo $nombre_rol;?>
                                        </option>

                                       <!-- <option value="<?php echo $rol['id_rol']?>">
                                            <?php echo $rol['nombre_rol']?>
                                        </option>-->
                                        <?php }?>
                                    </select>
                                </div>

                                

                           
                                <div class="form-group">
                                    <a href="" class="btn btn-default">Cancelar</a>
                                    <button class="btn btn-success" id="btn-editar-rol">Guardar</button>
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
    $('#btn-editar-rol').click(function(){

    let id_usuario =  $('#id_usuario').val();
    let id_rol =  $('#id_rol').val();

    let url = "../../app/controllers/roles/update_rol_usuario.php";
        $.get(url, {id_usuario:id_usuario, id_rol:id_rol}, function(datos){
        $('#respuesta_editar').html(datos);
        });
    });                       
</script>
