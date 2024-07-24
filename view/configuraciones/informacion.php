<?php

include_once('../../app/config.php');
include_once('../../layout/head.php');
include_once('../../app/controllers/usuarios/datos_usuario_sesion.php');
include_once('../../app/controllers/configuraciones/listado_de_informacion.php');

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
        <a href="create.php" class="btn btn-primary">Registrar nuevo</a>
            <h2 class="m-2">Listado de Información</h2>
            <table class="table table-bordered table-sm table-striped">
                <thead>
                    <tr>
                        <th>Nro parqueo</th>
                        <th>Nombre del parqueo</th>
                        <th>Actividad de la Empresa</th>
                        <th>Sucursal</th>
                        <th>Dirección</th>
                        <th>Zona</th>
                        <th>Teléfono</th>
                        <th>Ciudad</th>
                        <th>Pais</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       
                    <?php 
                    $contador_info = 0;
                    foreach ($informacion_datos as $info) {
                    $contador_info++;
                    $id_parqueo = $info['id_inf'];
                    $nombre_parqueo = $info['nombre_parqueo'];
                    $actividad_empresa = $info['actividad_empresa'];
                    $sucursal = $info['sucursal'];
                    $direccion = $info['direccion'];
                    $telefono = $info['telefono'];
                    $zona = $info['zona'];
                    $ciudad = $info['ciudad'];
                    $pais = $info['pais'];
                       ?>
                       <td><?php echo $contador_info ?></td>
                       <td><?php echo $nombre_parqueo ?></td>
                       <td><?php echo $actividad_empresa ?></td>
                       <td><?php echo $sucursal ?></td>
                       <td><?php echo $direccion ?></td>
                       <td><?php echo $telefono ?></td>
                       <td><?php echo $zona ?></td>
                       <td><?php echo $ciudad ?></td>
                       <td><?php echo $pais ?></td>
                       
                       <td>
                           <a href="update_configuraciones.php?id=<?php echo $id_parqueo;?>" class="btn btn-success">Editar</a>
                           <a href="delete.php?id=<?php echo $id_parqueo;?>" class="btn btn-danger">Borrar</a>
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




