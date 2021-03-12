
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
  <script src="<?= base_url() ?>/assets/admin/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/admin/js/jquery.mask.min.js"></script>
  <?php foreach($js_files as $file) { ?>
        <script src="<?php echo $file; ?>"></script>
  <?php } ?>
  
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
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="btn-inner--icon"><i class="ni ni-bell-55"></i></span>
                <span class="badge badge-danger"><?php $n = getNotif();echo $n['total'] ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary"> <?= $n['total'] ?></strong> notifications.</h6>
                </div>
                <div class="list-group list-group-flush">
                <?php foreach($n['rows'] as $row){?>
                  <a href="<?= base_url().'approve/detail/'.$row->kode_pengajuan ?>" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"><?= $row->nama_user ?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small><?= $row->last_update!=null?time_elapsed_string($row->last_update):time_elapsed_string($row->created_at);?></small>
                          </div>
                        </div>
                        <p class="text-sm mb-0"><?= 'Pengajuan No '.$row->kode_pengajuan ?></p>
                      </div>
                    </div>
                  </a>
                <?php }; ?>
                </div>
                <a href="<?= base_url().'approve' ?>" class="dropdown-item text-center text-primary font-weight-bold py-3">Lihat Semua</a>
              </div>
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
  
  <!-- Argon JS -->
  <script src="<?= base_url() ?>/assets/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/chart.js/dist/Chart.extension.js"></script>
  <script src="<?= base_url() ?>/assets/admin/js/argon.js?v=1.1.0"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
  <script type="text/javascript">
    const Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 3000
    });
  </script>
  <script>
    var BarsChart = (function() {

        //
        // Variables
        //

        var $chart = $('#chart-bulan');


        //
        // Methods
        //

        // Init chart
        function initChart($chart) {
          $.get({
            url: 'statistik/getpencairanbulan',
            success: function(e){
              var month;
              var value;
              month = e.map((e)=>{
                return e.month;
              })
              value = e.map((e)=>{
                return parseInt(e.value,10);
              });
              var ordersChart = new Chart($chart, {
                type: 'bar',
                data: {
                  labels: month,
                  datasets: [{
                    label: 'Rupiah',
                    data: value
                  }]
                },
                options: {
                  tooltips: {
                      callbacks: {
                          label: function(tooltipItem, data) {
                              return tooltipItem.yLabel.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                          }
                      }
                  }
                }
              });
            }
          });
          // Create chart
          

          // Save to jQuery object
          $chart.data('chart', ordersChart);
        }


        // Init chart
        if ($chart.length) {
          initChart($chart);
        }

        })();
  </script>
</body>

</html>