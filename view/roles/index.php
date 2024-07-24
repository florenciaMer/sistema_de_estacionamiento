<?php

include_once('../../app/config.php');
include_once('../../layout/head.php');
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
            <h2 class="m-2">Listado de roles</h2>
            <table class="table table-bordered table-sm table-striped">
                <thead>
                    <tr>
                        <th>Nro Rol</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       
                    <?php 
                    $contador_roles = 0;
                    foreach ($roles_datos as $rol) {
                        $contador_roles++;
                       $id_rol = $rol['id_rol'];
                       $nombre_rol = $rol['nombre_rol'];
                       $estado = $rol['estado'];
                  
                       ?>
                       <td><?php echo $contador_roles ?></td>
                       <td><?php echo $nombre_rol ?></td>
                       <td><?php echo $estado ?></td>
                       <td>
                           <a href="update.php?id=<?php echo $id_rol;?>" class="btn btn-success">Editar</a>
                           <a href="delete.php?id=<?php echo $id_rol;?>" class="btn btn-danger">Borrar</a>
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




