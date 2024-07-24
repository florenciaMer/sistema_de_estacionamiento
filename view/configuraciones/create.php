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
            <h2 class="m-2">Creación de nueva Empresa</h2>
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene todos los campos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                </div>
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-md-5">
                            <label>Nombre del Parqueo</label>
                            <input type="text" class="form-control" id="nombre_parqueo" name="nombre_parqueo">
                        </div>
                        <div class="col-md-5">
                            <label>Actividad de la Empresa</label>
                            <input type="text" class="form-control" id="actividad_empresa" name="actividad_empresa">
                        </div>
                        <div class="col-md-2">
                            <label>Sucursal</label>
                            <input type="text" class="form-control" id="sucursal" name="sucursal">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>
                        <div class="col-md-6">
                            <label>Zona</label>
                            <input type="text" class="form-control" id="zona" name="zona">
                        </div>
                        <div class="col-md-4">
                            <label>Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono">
                        </div>
                        <div class="col-md-4">
                            <label>Ciudad</label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad">
                        </div>
                        <div class="col-md-4">
                            <label>Pais</label>
                            <input type="text" class="form-control" id="pais" name="pais">
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="" class="btn btn-default btn-block">Cancelar</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-block" id="btn_registrar">Registrar</button>
                        </div>
                    </div>
                </div>
                <div id="respuesta_create"></div>
            </div>
        </div>         
  </div>
</div>
</body>
</html>

<script>
  $('#btn_registrar').click(function(){
 
 let nombre_parqueo =  $('#nombre_parqueo').val();
 let actividad_empresa =  $('#actividad_empresa').val();
 let sucursal =  $('#sucursal').val();
 let direccion =  $('#direccion').val();
 let telefono =  $('#telefono').val();
 let zona =  $('#zona').val();
 let ciudad =  $('#ciudad').val();
 let pais =  $('#pais').val();

 
 if (nombre_parqueo == "") {
     alert('debe completar el nombre del parqueo');
   $('#nro_espacio').focus();
 }
 if (actividad_empresa == "") {
     alert('debe completar el nombre de la actividad');
   $('#actividad_empresa').focus();
 }
 if (sucursal == "") {
     alert('debe completar la sucursal');
   $('#sucursal').focus();
 }
 if (direccion == "") {
     alert('debe completar la direccion');
   $('#actividad_empresa').focus();
 }
 else if (zona == "") {
     alert('debe completar la zona');
   $('#zona').focus();
 }
 else if (telefono == "") {
     alert('debe completar el telefono');
   $('#telefono').focus();
 }
 else if (ciudad == "") {
     alert('debe completar el nombre de la ciudad');
   $('#ciudad').focus();
 }
 else if (pais == "") {
     alert('debe completar el Pais');
   $('#pais').focus();
 }
else{
   let url = "../../app/controllers/configuraciones/create_informacion.php";
        $.get(url, {nombre_parqueo:nombre_parqueo, actividad_empresa:actividad_empresa,sucursal:sucursal, 
            direccion:direccion,telefono:telefono,zona:zona,ciudad:ciudad, pais:pais
         }, function(datos){
         $('#respuesta_create').html(datos);
        });
   }
 });
</script>



