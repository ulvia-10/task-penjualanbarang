<?php  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>TK4 - PENJUALAN BARANG</title>
    <!-- <link href="<?php echo base_url('assets/css/styles.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
     <link href="<?php echo base_url('assets/css/styles.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/all.min.js') ?>" crossorigin="anonymous"></script>
    <!-- CSS untuk datatables-->
    <link href="<?php echo base_url('assets/dataTables/bulma.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/dataTables/jquery.dataTables.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/dataTables/buttons.dataTables.min.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/select2.min.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template-->
    <style type="text/css">
        .divider:after,
        .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
        }
        .h-custom {
        height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
        .h-custom {
        height: 100%;
        }
        }
    </style>
    
</head>
<body class="sb-nav-fixed">
   <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="<?php echo base_url('assets/img/7036172.jpg') ?>"
              class="img-fluid" alt="Sample image">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                <p class="lead fw-normal mb-0 me-3">Welcome to TK 4 - Team 6</p>
              </div>

              <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0">Sign In</p>
              </div>
            <form action="<?php echo site_url('Login/Login_Controller/aksi_login') ?>" method="post" autocomplete="off">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" id="form3Example3" name="NamaPengguna" class="form-control form-control-lg"
                  placeholder="Enter username" />
                <label class="form-label" for="form3Example3">Username</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <input type="password" id="form3Example4" name="Password" class="form-control form-control-lg"
                  placeholder="Enter password" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <p class="small fw-bold mt-2 pt-1 mb-0"><a href="#!"
                    class="small fw-bold mt-2 pt-1 mb-0">Forgot password?</a></p>
              </div>

            </form>
          </div>
        </div>
      </div>
      <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
          Copyright © 2023. Team 6.
        </div>
        <!-- Copyright -->

        
        <!-- Right -->
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/scripts.js') ?>"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/chart.js') ?>"></script>
</body>

</html>