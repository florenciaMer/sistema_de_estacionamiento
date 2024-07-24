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
            <h2 class="m-2">Listado de Usuarios</h2>
            <table class="table table-bordered table-sm table-striped">
                <thead>
                    <tr>
                        <th>Nro Usuario</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol del Usuario</th>
                        <th>Acciones</th>
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
                        <?php 
                            if($id_rol == NULL) {
                             echo "Sin rol";
                          } else { 
                            foreach ($roles_datos as $rol) {
                                if ($id_rol== $rol['id_rol']) {
                                    echo $rol['nombre_rol']; 
                                }
                            }
                            } ?>
                        </td>
                       <td>
                           <a href="update.php?id=<?php echo $id_usuario;?>" class="btn btn-success">Editar</a>
                           <a href="delete.php?id=<?php echo $id_usuario;?>" class="btn btn-danger">Borrar</a>
                       </td>
                   </tr>
                  <?php  }
                    ?>
                </tbody>
            </table>
    </div>
  </div>
</body>
</html>




