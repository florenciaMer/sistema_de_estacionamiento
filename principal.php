<?php


include_once('app/config.php');
include_once('layout/head.php');
//include_once('layout/parte1.php');
include_once('layout/navbar.php');
include_once('layout/sidebar.php');

include_once('app/controllers/parqueo/listado_de_parqueo.php');
include_once('app/controllers/configuraciones/listado_de_informacion.php');
//include_once('app/controllers/tickets/listado_de_tickets.php');
//include_once('app/controllers/login/login.php');

//recuperar el id de la informacion
foreach ($informacion_datos as $info) {
  $id_informacion = $info['id_inf'];
  # code...
}

if(isset($_SESSION['usuario_sesion'])){
?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php 
  include_once('layout/menu.php');
  include_once('app/config.php');
 
   
  //if ($_SESSION['usuario_sesion']) {
  
  if(isset($_SESSION['usuario_sesion'])){
    ?>
   
  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <?php include_once('layout/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
        <br>
      <div class="row p-4">

      
      <h2 class="m-2"> Bienvenido SIS | Estacionamiento</h2>
     <?php 
      echo $_SESSION['usuario_sesion'];?>

    <div class="col-md-12">
          <div class="card card-outline card-primary">
              <div class="card-header">
              <h3 class="card-title">Mapeo  de Vehiculos</h3>
                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                  </button>
                  </div>
              </div>

              <div class="row">
                  <?php foreach ($parqueo_datos as $parqueo) {
                    $id_map = $parqueo['id_map'];
                    $nro_espacio = $parqueo['nro_espacio'];
                   ;
                  

                    if ($parqueo['estado_espacio'] == "libre")  {?>
                    <div class="col"style="text-align: center;">
                      
                    <h2><?php echo $parqueo['nro_espacio']?></h2>
                    <button class="btn btn-success" style="width: 100%; height:114px" data-toggle="modal" data-target="#modal<?php echo $id_map?>">
                      <p><?php echo $parqueo['estado_espacio']?></p>
                    </button>
                      
                          <!-- Modal -->
                          <div class="modal fade" id="modal<?php echo $id_map?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Ingreso de Vehiculos</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Placa:<span style="color: red;"><b>*</b></span></label>
                                    <div class="col-sm-6">
                                      <input type="text" style="text-transform: uppercase;" class="form-control" id="placa<?php echo $id_map?>" require>
                                      <input type="text" style="text-transform: uppercase;" class="form-control" id="id_map<?php echo $id_map?>" value="<?php echo $id_map?>" hidden>
                                    </div>
                                    <div class="col-sm-3">
                                    
                                      <button class="btn btn-primary" id="btn_buscar_cliente<?php echo $id_map?>" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                      </svg>
                                      Buscar
                                    </button>
                                  
                                    <script>
                                        $('#btn_buscar_cliente<?php echo $id_map?>').click(function(){
                                          var placa = $('#placa<?php echo $id_map?>').val();
                                          var id_map = $('#id_map<?php echo $id_map?>').val();
                                         
                                          if(placa == ""){
                                            alert("Ingrese la placa del vehiculo");
                                            $('#placa<?php echo $id_map?>').focus();
                                          }else{
                                          let url = "app/controllers/clientes/buscar_cliente.php";
                                          
                                            $.get(url, {placa:placa, id_map:id_map}, function(datos){
                                            $('#respuesta<?php echo $id_map?>').html(datos);
                                            });
                                          }
                                        })
                                    </script>
                                    </div>
                                  </div>
                                  <div id="respuesta<?php echo $id_map?>">
                                    
                                  </div>
                                  <div id="respuesta_buscar2<?php echo $id_map?>">
                                    
                                  </div>
                                  <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Fecha ingreso:</label>
                                    <div class="col-sm-8">
                                      <input type="date" class="form-control" id="fecha_ingreso<?php echo $id_map?>" value="<?php echo $anio  .'-'. $mes.'-'. $dia;?>">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Hora de ingreso:</label>
                                    <div class="col-sm-8">
                                      <input type="time" class="form-control" id="hora_ingreso<?php echo $id_map?>" value="<?php echo $hora .':' .$minutos;?>">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Nro de cuviculo:</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="nro_cuviculo<?php echo $id_map?>" value="<?php echo $nro_espacio;?>">
                                    </div>
                                  </div>
                              </div><!-- cierre modal body-->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                  <button type="button" class="btn btn-primary" id="btn-imprimir-ticket<?php echo $id_map?>">Imprimir ticket</button>
                                <script>
                                  $('#btn-imprimir-ticket<?php echo $id_map?>').click(function(){
                                    var id_map = $('#id_map<?php echo $id_map?>').val();
                                    var placa = $('#placa<?php echo $id_map?>').val();
                                    var nombre_cliente = $('#nombre_cliente<?php echo $id_map?>').val();
                                    var id_cliente = $('#id_cliente<?php echo $id_map?>').val();
                                    var dni = $('#dni<?php echo $id_map?>').val();
                                    var fecha_ingreso = $('#fecha_ingreso<?php echo $id_map?>').val();
                                    var hora_ingreso = $('#hora_ingreso<?php echo $id_map?>').val();
                                    var nro_cuviculo = $('#nro_cuviculo<?php echo $id_map?>').val();
                                    if(placa == ""){
                                      alert("Ingrese la placa del vehiculo");
                                      $('#placa<?php echo $id_map?>')

                                    }else if(nombre_cliente == ""){
                                      alert("Ingrese el nombre del cliente");
                                      $('#nombre_cliente<?php echo $id_map?>').focus();
                                    }else if(dni == ""){
                                      alert("Ingrese el DNI del cliente");
                                      $('#dni<?php echo $id_map?>').focus();
                                    }else{
                                      
                                    let urlEstado = "app/controllers/parqueo/cambiar_estado_ocupado.php";
                                            $.get(urlEstado, {
                                              nro_cuviculo:nro_cuviculo
                                               }, function(datos){
                                            $('#respuesta_buscar2<?php echo $id_map?>').html(datos);
                                            });
                                    
                                    let url2 = "app/controllers/clientes/create_cliente.php";
                                            $.get(url2, {nombre_cliente:nombre_cliente,
                                              dni:dni,placa:placa
                                               }, function(datos){
                                            $('#respuesta_buscar2').html(datos);
                                            });

                                    let url3 = "app/controllers/tickets/registro_tickets.php";
                                            $.get(url3, {id_map:id_map,placa:placa, nombre_cliente:nombre_cliente,
                                              dni:dni,fecha_ingreso:fecha_ingreso,hora_ingreso:hora_ingreso,
                                              nro_cuviculo:nro_cuviculo
                                               }, function(datos){
                                            $('#respuesta_buscar2').html(datos);
                                            });
                                          }
                                          });
                                
                                </script>
                                </div>
                            </div>
                          </div>
                        </div> <!--cierre modal-->
                    </div>
                    <!-- espacio OCUPADO -->
                    <?php }else{
                      
                    
                    ?>
                        <div class="col"style="text-align: center;">
                        <h2 ><?php echo $parqueo['nro_espacio']?></h2>
                        
                    <button class="btn btn-info" id="btn_ocupado<?php echo $id_map;?>" data-toggle="modal"
                    data-target="#modal<?php echo $id_map?>">
                        <img src="<?php echo $URL;?>/public/img/auto1.png" width="60px" alt="">
                    </button>
                     OCUPADO
                    <?php

                    $query_datos_cliente = $pdo->prepare("SELECT * FROM tb_tickets WHERE cuviculo = '$nro_espacio' AND estado = '1' ");
                    $query_datos_cliente->execute();
                    $datos_clientes = $query_datos_cliente->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach($datos_clientes as $datos_cliente){
                        $id_ticket = $datos_cliente['id_ticket'];
                        $placa = $datos_cliente['placa'];
                        $nombre_cliente = $datos_cliente['nombre_cliente'];
                        $dni = $datos_cliente['dni'];
                        $cuviculo = $datos_cliente['cuviculo'];
                        $fecha_ingreso = $datos_cliente['fecha_ingreso'];
                        $hora_ingreso = $datos_cliente['hora_ingreso'];
                        $user_sesion = $datos_cliente['user_sesion'];
                       
                      }?>
                      
                          <!-- Modal -->
                          <div class="modal fade" id="modal<?php echo $id_map?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Ingreso de Vehiculos</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Placa:</label>
                                    <div class="col-sm-8">
                                      <input type="text" style="text-transform: uppercase;" class="form-control" id="placa<?php echo $id_map?>" value="<?php echo $placa?>" disabled>
                                      <input type="text" style="text-transform: uppercase;" class="form-control" id="id_map<?php echo $id_map?>" value="<?php echo $id_map?>" hidden>
                                    </div>
                                    
                                  </div>
                                  <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Nombre cliente:</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="fecha_ingreso<?php echo $id_map?>" value="<?php echo $nombre_cliente;?>" disabled>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">DNI cliente:</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="fecha_ingreso<?php echo $id_map?>" value="<?php echo $dni;?>" disabled>
                                    </div>
                                  </div>

                                  
                                  
                                  <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Fecha ingreso:</label>
                                    <div class="col-sm-8">
                                      <input type="date" class="form-control" id="fecha_ingreso<?php echo $id_map?>" value="<?php echo $fecha_ingreso;?>" disabled>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Hora de ingreso:</label>
                                    <div class="col-sm-8">
                                      <input type="time" class="form-control" id="hora_ingreso<?php echo $id_map?>" value="<?php echo $hora_ingreso;?>" disabled>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Nro de cuviculo:</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="nro_cuviculo<?php echo $id_map?>" value="<?php echo $cuviculo;?>" disabled>
                                    </div>
                                  </div>
                              </div><!-- cierre modal body-->
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                                
                                  <a href="<?php echo $URL?>/app/controllers/tickets/cancelar_ticket.php?id=<?php echo $id_ticket;?>&&cuviculo=<?php echo $cuviculo?>" class="btn btn-danger">Cancelar</a>
                                  <a href="<?php echo $URL?>/view/tickets/reimprimir_ticket.php?id=<?php echo $id_ticket;?>" class="btn btn-primary" id="btn-imprimir-ticket<?php echo $id_map?>">Volver a Imprimir</a>
                                  <button type="button" class="btn btn-success"  id="btn-facturar<?php echo $id_map?>">Facturar</button>
                              <script>
                                $('#btn-facturar<?php echo $id_map?>').click(function(){
                                  var id_informacion = "<?php echo $id_informacion;?>";
                                  
                                })
                              </script>
                              </div>
                              </div><!-- cierre modal dialogo-->
                            </div>
                          </div>
              
                        <script>
                         
                        </script>
                       
                      </div>
                  <?php  }?>
                  
                    
                  <?php } ?>
                  <?php } ?>
                  
                </div>
          </div><!-- Button trigger modal -->


      </div>        
    </div>
  </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  


</body>
</html>

<?php
  //include_once('layout/parte2.php');
}
else{
   echo "Para ingresar a esta plataforma debe iniciar sesion";
}
?>



