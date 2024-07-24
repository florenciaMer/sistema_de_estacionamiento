<?php

include_once('../../app/config.php');
include_once('../../layout/head.php');
include_once('../../app/controllers/roles/listado_roles.php');
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
            <h2 class="m-2">Asignacion de roles a usuarios</h2>
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
             <h3 class="card-title">Listado de Usuarios</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                </div>

            </div>

            <div class="card-body" style="display: block;">
            <table class="table table-bordered table-sm table-striped">
                <thead>
                    <tr>
                        <th>Nro Usuario</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Asignar rol</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       
                    <?php 
                    $contador_usuarios = 0;
                    foreach ($usuarios_datos as $usuario) {
                        $contador_usuarios++;
                       $id_usuario = $usuario['id_usuario'];
                       $nombre_usuario = $usuario['nombre_usuario'];
                       $email_usuario = $usuario['email_usuario'];
                       $estado_usuario = $usuario['estado'];
                       $id_rol = $usuario['id_rol'];
                       ?>
                       <td><?php echo $contador_usuarios ?></td>
                       <td><?php echo $nombre_usuario ?></td>
                       <td><?php echo $email_usuario ?></td>
                       <td>
                        <?php if ($id_rol == "") {?>
                                  
                           <!-- Button trigger modal -->
                           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $id_usuario ?>">
                            Asignar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo $id_usuario ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Asignar Rol</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="../../app/controllers/roles/controller_asignar.php" >
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre del Usuario</label>
                                                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="<?php echo $nombre_usuario ?>">   
                                                    <input type="text" name="id_usuario" value="<?php echo $id_usuario?>" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="nombre">Email del Usuario</label>
                                                    <input type="text" class="form-control" id="email_usuario" name="email_usuario" value="<?php echo $email_usuario ?>">   
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="nombre">Rol del Usuario</label>
                                                    <select name="id_rol" id="id_rol" class="form-control">
                                                        <?php 
                                                         foreach ($roles_datos as $rol) {
                                                            $id_rol = $rol['id_rol'];
                                                            $nombre_rol = $rol['nombre_rol'];
                                                        ?>

                                                        <option value="<?php echo $id_rol?>"><?php echo $nombre_rol?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                      
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                                <div id="respuesta_update_rol_usuario"></div>
                                </form>
                                </div>
                                
                            </div>
                         </div> <!-- fin modal-->

                        <?php } else {
                           foreach ($roles_datos as $rol) {
                            if ($id_rol== $rol['id_rol']) {
                                echo $rol['nombre_rol']; 
                            }
                        }?>
                         <a href="update_rol_usuario.php?id_usuario=<?php echo $id_usuario;?>&id_rol=<?php echo $id_rol;?>" class="btn btn-primary">Editar</a>      
                       
                       <?php  }?>
                        </td>
                   </tr>
                  <?php  }
                    ?>
                </tbody>
            </table>  
            </div>
        </div>
    </div>        
  </div>
  </div>
</body>
</html>




