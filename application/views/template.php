
<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>NPD - INTEGRATED</title>
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url() ?>/assets/admin/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/css/argon.css?v=1.1.0" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendor/sweetalert2/dist/sweetalert2.min.css">

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
  <?php $this->load->view('sidebar');?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-md rounded-circle">
                    <img alt="Image placeholder" height="50" src="<?= base_url() ?>assets/avatars/<?= $this->session->userdata('foto')?$this->session->userdata('foto'):'profil.png';?>">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?= $this->session->userdata('nama_user');?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url() ?>home/logout" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
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