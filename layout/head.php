
<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIS | Estacionamiento</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo $URL?>/public/templates/admintemplate/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL?>/public/templates/admintemplate/dist/css/adminlte.min.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <!--<script src="<?php echo $URL?>/public/templates/admintemplate/plugins/jquery/jquery.min.js"></script>-->

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<!-- Datetable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

<!-- bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body class="hold-transition sidebar-mini">
<?php


  if (isset($_SESSION['mensaje'])) {
    $respuesta = $_SESSION['mensaje'];
    $icon = $_SESSION['icono'];
    ?>
  <script>
      Swal.fire({
      position: "top-end",
      icon: '<?php echo $icon ?>',
      title: '<?php echo $respuesta ?>',
      showConfirmButton: false,
      timer: 1500
   });
  <?php session_destroy();?>

  </script>
    
  </body>
  <?php
  }
?>