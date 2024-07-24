<?php

include_once('../../app/config.php');
include_once('../../layout/head.php');
include_once('../../app/controllers/usuarios/datos_usuario_sesion.php');
include_once('../../app/controllers/usuarios/listado_usuarios.php');

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

                foreach ($usuarios_datos as $usuario) {
                   if($usuario['id_usuario'] == $id_get){
                    $nombre = $usuario['nombre_usuario'];
                    $email = $usuario['email_usuario'];
                    $password = $usuario['password_usuario'];
                   }
                }
                ?>


                <div class="row">
                   <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-danger" style="color:white">
                            <h3 class="card-title">Está seguro que desea eliminar al usuario?</h3> 
                        </div>
                        
                        <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $id_get?>" hidden>
                                    <input type="text" id="nombre_usuario" name="nombre" class="form-control" value="<?php echo $nombre?>">
                                </div>
                           
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email_usuario" id="email_usuario" class="form-control"  value="<?php echo $email?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Password</label>
                                    <input type="password" name="password_usuario" id="password_usuario" class="form-control"  value="<?php echo $password?>">
                                </div>
                           
                                <div class="form-group">
                                    <a href="index.php" class="btn btn-default">Cancelar</a>
                                    <button class="btn btn-danger" id="btn-delete">Confirmar</button>
                                </div>
                        </div> 
                    </div>
                 </div>
                 <div id="respuesta_create"></div>
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
 
 let id_usuario =  $('#id_usuario').val();
 
   let url = "../../app/controllers/usuarios/delete.php";
        $.get(url, {id_usuario:id_usuario}, function(datos){
         $('#respuesta_delete').html(datos);
        });
 });
</script>
