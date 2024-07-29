

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<!--
<script src="../sistemaEstacionamiento/public/js/jquery-3.5.1.slim.min.js" ></script>
<script src="../sistemaEstacionamiento/public/js/jquery-3.5.1.min.js" ></script>
-->
<?php include_once('app/controllers/parqueo/listado_de_parqueo.php');?>

<script src="../sistemaEstacionamiento/public/js/popper.min.js" ></script>
<script src="../sistemaEstacionamiento/public/js/bootstrap.min.js" ></script>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
 
<div class="container">
<br>
<div class="row">


            <h2 class="m-2">Bienvenido a SIS | Estacionamiento</h2>
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

              <div class="card-body" style="display: block; background-image:url('<?php echo $URL;?>/public/img/piso.jpg')">
                <div class="row">
                  <?php foreach ($parqueo_datos as $auto) {
                    if ($auto['estado_espacio'] == "libre") {?>
                    <div class="col"style="text-align: center;">
                      
                    <h2><?php echo $auto['nro_espacio']?></h2>
                    <button class="btn btn-success" style="width: 100%; height:114px">
                      <p><?php echo $auto['estado_espacio']?></p>
                    </button>
                    </div>.
                    <?php }else{?>
                        <div class="col"style="text-align: center;">
                        <h2 ><?php echo $auto['nro_espacio']?></h2>
                        <button class="btn btn-info">
                            <img style="text-align: center;" src="<?php echo $URL;?>/public/img/auto1.png" width="50px">
                        </button>
                        <p><?php echo $auto['estado_espacio']?></p>
                      </div>
                  <?php  }?>
                  
                    
                  <?php } ?>
                  
                </div>
              </div>
          </div>
      </div>         
</div>

</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<footer class="bg-white p-6" style="width: 1400px; margin:10px; padding:40px">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="<?php echo $URL?>/public/templates/admintemplate/dist/js/adminlte.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo $URL?>/public/templates/admintemplate/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
</body>
</html>
  