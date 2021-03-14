<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Core</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="<?= base_url("recursos_plantilla/plugins/fontawesome-free/css/all.min.css")?>" rel="stylesheet">

  <link href="<?= base_url("recursos_plantilla/plugins/icheck-bootstrap/check-bootstrap.min.css")?>" rel="stylesheet">

  <link href="<?= base_url("recursos_plantilla/dist/css/adminlte.min.css")?>" rel="stylesheet">
  <link href="<?= base_url("recursos_plantilla/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css")?>" rel="stylesheet">
  <script src="<?= base_url("recursos_plantilla/plugins/jquery/jquery.min.js")?>"></script>
</head>
<body class="hold-transition login-page">

    <?= $contenido  ?>

<script src="<?= base_url("recursos_plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<script src="<?= base_url("recursos_plantilla/plugins/sweetalert2/sweetalert2.min.js")?>"></script>
<script src="<?= base_url("recursos_plantilla/dist/js/adminlte.min.js")?>"></script>
<script>
    <?= mostrar_mensaje(); ?>
</script>
</body>
</html>
