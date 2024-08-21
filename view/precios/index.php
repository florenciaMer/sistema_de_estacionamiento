<?php

include_once('../../app/config.php');
include_once('../../layout/head.php');


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
            <h2 class="m-2">Listado de Precios</h2>
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Precios registrados</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                </div>
                <div class="card-body">
                <table class="table table-bordered table-sm table-striped">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Detalle</th>
                        <th>Precio</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       
                    <?php 
                    $contador_precio = 0;
                    $sql_precio = "SELECT * FROM tb_precios WHERE estado = 1";
                    
                    $query_precio = $pdo->prepare($sql_precio);
                    $query_precio->execute();
                    $precio_datos = $query_precio->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($precio_datos as $dato) {
                    $contador_precio++;
                       $fyh_creacion = $dato['fyh_creacion'];
                       $id_precio = $dato['id_precio'];
                       $cantidad = $dato['cantidad'];
                       $detalle = $dato['detalle'];
                       $precio = $dato['precio'];
                   
                       ?>
                       <td><?php echo $contador_precio ?></td>
                       <td><?php echo $fyh_creacion ?></td>
                       <td><?php echo $cantidad ?></td>
                       <td><?php echo $detalle ?></td>
                       <td><?php echo '$'. $precio ?></td>
                       <td class="col-md-2">
                           <a href="update.php?id_precio=<?php echo $id_precio;?>" class="btn btn-primary">Editar</a>
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




