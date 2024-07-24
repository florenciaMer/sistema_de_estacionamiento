<?php

include_once('../../app/config.php');
include_once('../../layout/head.php');
include_once('../../app/controllers/usuarios/datos_usuario_sesion.php');

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
            <div class="container">
                <div class="row">
                   <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" style="background-color: #007bff; color:white">
                            <p class="h4">Nuevo Rol</p> 
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre_rol" name="nombre_rol" class="form-control" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="text" name="estado" id="estado" class="form-control" required>
                            </div>
                        
                            <div class="form-group">
                                <a href="" class="btn btn-default">Cancelar</a>
                                <button class="btn btn-primary" id="btn-guardar">Guardar</button>
                            </div>
                        </div> 
                    </div>
                 </div>
                 <div id="respuesta_create"></div>
<script>
  $('#btn-guardar').click(function(){
 
 let nombre_rol =  $('#nombre_rol').val();
 let estado =  $('#estado').val();
 
 
 if (nombre_rol == "") {
   $('#nombre_rol').focus();
        // document.getElementById('lbl_create').style.display = 'block';
 }else if(estado == ""){
    $('#estado').focus();
 
 }else{
   let url = "../../app/controllers/roles/create.php";
        $.get(url, {nombre_rol:nombre_rol, estado:estado}, function(datos){
         $('#respuesta_create').html(datos);
        });
   }
 });
</script>
                </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
            </div>
    </div>
  </div>
</body>
</html>
