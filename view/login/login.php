<?php 
//include_once('../../layout/parte1.php');
//include_once(dirname(__DIR__)."/../layout/parte1.php");

?>
<!-- Datetable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inicio de Sesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="col-md-12">
              <div class="row">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="usuario_user" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-12">
              <div class="row">
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" id="password_user" class="form-control">
                </div>
            </div>
        </div>
       <div id="respuesta"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn-ingresar">Ingresar</button>
      </div>
    </div>
    <div id="respuesta"></div>
  </div>
</div>

<script>
    $('#btn-ingresar').click(function(){
       login();
    })
    $('#password_user').keypress(function(e){
      //presiona enter
      if(e.which == 13){
        login();
      }
    });
  
  function login(){
    var usuario_user = $('#usuario_user').val();
    var password_user = $('#password_user').val();

    var url = '../../<?php echo $URL ?>/app/controllers/login/login.php';
    
    $.get(url, {usuario_user:usuario_user, password_user:password_user}, function(datos){
        $('#respuesta').html(datos);
    });
  }
</script>
