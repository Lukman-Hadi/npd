<!DOCTYPE html>
<html>

<head>
  <title>NPD - INTEGRATED</title>
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url() ?>/assets/admin/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/css/argon.css?v=1.1.0" type="text/css">
  <?php 
    foreach($css_files as $file) { ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
  <?php } ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/admin/js/jquery.mask.min.js"></script>
  <?php foreach($js_files as $file) { ?>
        <script src="<?php echo $file; ?>"></script>
  <?php } ?>
  <script src="<?= base_url() ?>/assets/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
</head>

<body>
  <!-- Sidenav -->
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <!-- Header -->
    <?php echo $contents ?>
  </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <!-- Optional JS -->
  <script src="<?= base_url() ?>/assets/admin/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/chart.js/dist/Chart.extension.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
  <!-- Argon JS -->
  <script src="<?= base_url() ?>/assets/admin/js/argon.js?v=1.1.0"></script>

  <script type="text/javascript">
    const Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 3000
    });
    </script>
</body>

</html>