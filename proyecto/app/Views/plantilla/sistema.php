<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="<?= base_url("recursos_plantilla/plugins/fontawesome-free/css/all.min.css")?>" rel="stylesheet">
  <link href="<?= base_url("recursos_plantilla/dist/css/adminlte.min.css")?>" rel="stylesheet">
  <link href="<?= base_url("recursos_plantilla/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css")?>" rel="stylesheet">
  <script src="<?= base_url("recursos_plantilla/plugins/jquery/jquery.min.js")?>"></script>


  <!-- jQuery -->

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php $session =session() ?>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  data-slide="true" href="<?= base_url("routing/".TAREA_LOGOUT)?>" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('recursos_plantilla/dist/img/AdminLTELogo.png');?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('recursos_plantilla/dist/img/jorge_avila.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $session->get('nombre') ?></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper">
      <?= $contenido ?>
  </div>

  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="<?= base_url("recursos_plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<script src="<?= base_url("recursos_plantilla/plugins/sweetalert2/sweetalert2.min.js")?>"></script>
<script src="<?= base_url("recursos_plantilla/plugins/chart.js/Chart.min.js")?>"></script>
<script src="<?= base_url("recursos_plantilla/dist/js/adminlte.js")?>"></script>
<script>
    <?= mostrar_mensaje(); ?>
</script>
</body>
</html>
