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
                            <p class="h4">Nuevo Usuario</p> 
                        </div>
                        <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="nombre_usuario" name="nombre" class="form-control" required>
                                </div>
                           
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email_usuario" id="email_usuario" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Password</label>
                                    <input type="password" name="password_usuario" id="password_usuario" class="form-control" required>
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
 
 let nombre_usuario =  $('#nombre_usuario').val();
 let email_usuario =  $('#email_usuario').val();
 let password_usuario =  $('#password_usuario').val();
 
 if (nombre_usuario == "") {
   $('#nombre_usuario').focus();
        // document.getElementById('lbl_create').style.display = 'block';
 }else if(email_usuario == ""){
    $('#email_usuario').focus();
 }else if(password_usuario == ""){
    $('#password_usuario').focus();
 }else{
   let url = "../../app/controllers/usuarios/create.php";
        $.get(url, {nombre_usuario:nombre_usuario, email_usuario:email_usuario, password_usuario:password_usuario}, function(datos){
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
