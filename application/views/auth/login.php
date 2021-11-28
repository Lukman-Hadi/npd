<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Lukman Hadi">
  <title>NPD INTEGRATED</title>
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url() ?>/assets/admin/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendor/sweetalert2/dist/sweetalert2.min.css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/css/argon.css?v=1.1.0" type="text/css">
</head>

<body class="bg-default">
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Selamat Datang!</h1>
              <p class="text-lead text-white">Aplikasi Nota Pencairan Dana Terintegrasi</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Sign In With Your Credentials</small>
              </div>
              <form role="form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-badge"></i></span>
                    </div>
                    <input id="user" class="form-control" placeholder="Username" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="pass" class="form-control" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="text-center">
                  <button id="btn" type="button" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-12 col-md-12 col-lg-12">
          <div class="copyright text-center text-xl-center text-muted">
            &copy; <?= date('Y') ?> <a href="https://www.dpmptsp.pandeglangkab.go.id" class="font-weight-bold ml-1" target="_blank">DPMPTSP Kab Pandeglang</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?= base_url() ?>/assets/admin/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
  <!-- Argon JS -->
  <script src="<?= base_url() ?>/assets/admin/js/argon.js?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="<?= base_url() ?>/assets/admin/js/demo.min.js"></script>
  <script type="text/javascript">
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      $('#btn').on('click',function(){
        var user = $('#user').val();
        var pass = $('#pass').val();
        $.ajax({
            type: "POST",
            url : "<?= base_url('login/dologin')?>",
            data: 'username='+user+'&password='+pass, 
            dataType: 'json',
            success: function(res){
                if (res.errorMsg){
                    Toast.fire({
                    type: 'error',
                    title: ''+res.errorMsg+'.'
                    })
                } else {
                    console.log('res', res.errorMsg)
                    Toast.fire({
                    type: 'success',
                    title: ''+res.message+'.'
                })
                window.setTimeout(function(){
                  window.location.href="<?= base_url('home')?>";
                },1000);
                }
            // success: function(msg){
            //   var jsondata= JSON.parse(JSON.stringify(msg));
            //   var val = jsondata.data.map(function(e) {
            //      return e.value;
            //   });
            //   var message = jsondata.data.map(function(e) {
            //      return e.message;
            //   });
            //   if (val == 0){
            //     Toast.fire({
            //       type: 'error',
            //       title: ''+message+'.'
            //       })
            //   }else{
            //     Toast.fire({
            //       type: 'success',
            //       title: ''+message+'.'
            //     });
            //     window.setTimeout(function(){
                //   window.location.href="";
            //     },1000);
            //   }
            // }
            }
        },'json'); 
      });
    </script>
</body>

</html>
