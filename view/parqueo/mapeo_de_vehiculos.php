<?php

include_once('../../app/config.php');
include_once('../../layout/head.php');
include_once('../../app/controllers/roles/listado_roles.php');

?>


<body class="hold-transition sidebar-mini">

<div class="wrapper">

  <!-- Navbar -->
  <?php 
  include_once('../../layout/menu.php');
  include_once('../../app/controllers/parqueo/listado_de_parqueo.php');
  
  ?>

   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once('../../layout/sidebar.php');?>
  <div class="content-wrapper">
    <div class="container">
        <br>
            <h2 class="m-2">Listado de espacios</h2>
            <table class="table table-bordered table-sm table-striped">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Nro Espacio</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       
                    <?php 
                    $contador_parqueo = 0;
                    foreach ($parqueo_datos as $dato) {
                    $contador_parqueo++;
                       $id_paqueo = $dato['id_map'];
                       $nro_espacio = $dato['nro_espacio'];
                   
                  
                       ?>
                       <td><?php echo $contador_parqueo ?></td>
                       <td><?php echo $nro_espacio ?></td>
                       <td>
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




