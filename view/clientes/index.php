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
            <h2 class="m-2">Listado de clientes</h2>
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Clientes registrados</h3>
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
                        <th>Nombre del Cliente</th>
                        <th>DNI</th>
                        <th>Placa</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       
                    <?php 
                    $contador_cliente = 0;
                    $sql_cliente = "SELECT * FROM tb_clientes WHERE estado_cliente = 1";
                    
                    $query_cliente = $pdo->prepare($sql_cliente);
                    $query_cliente->execute();
                    $cliente_datos = $query_cliente->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($cliente_datos as $dato) {
                    $contador_cliente++;
                       $id_cliente = $dato['id_cliente'];
                       $nombre_cliente = $dato['nombre_cliente'];
                       $dni = $dato['dni'];
                       $placa_auto = $dato['placa_auto'];
                   
                       ?>
                       <td><?php echo $contador_cliente ?></td>
                       <td><?php echo $nombre_cliente ?></td>
                       <td><?php echo $dni ?></td>
                       <td><?php echo $placa_auto ?></td>
                       <td class="col-md-2">
                           <a href="update.php?id_cliente=<?php echo $id_cliente;?>" class="btn btn-primary">Editar</a>
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




