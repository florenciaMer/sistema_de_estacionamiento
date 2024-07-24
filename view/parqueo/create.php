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
            <h2 class="m-2">Creación de un nuevo espacio</h2>
        <div class="col-md-8">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nro_espacio">Nro espacio</label>
                                <input type="number" class="form-control" id="nro_espacio">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estado_espacio">Estado del espacio</label>
                                <select name="estado_espacio" id="estado_espacio" class="form-control">
                                    <option value="libre">Libre</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="obs">Observaciones</label>
                                <textarea name="obs" id="obs" class="form-control">

                                </textarea>
                            </div>
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
 
 let nro_espacio =  $('#nro_espacio').val();
 let estado_espacio =  $('#estado_espacio').val();
 let obs =  $('#obs').val();

 
 if (nro_espacio == "") {
     alert('debe completar el numero de espacio');
   $('#nro_espacio').focus();

 }
else{
   let url = "../../app/controllers/parqueo/create.php";
        $.get(url, {nro_espacio:nro_espacio, estado_espacio:estado_espacio,obs:obs }, function(datos){
         $('#respuesta_create').html(datos);
        });
   }
 });
</script>



