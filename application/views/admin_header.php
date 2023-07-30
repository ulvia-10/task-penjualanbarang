<?php  ?>
<html lang="en">

<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="noindex, nofollow">
    <title>TK4 - Team 6 DJBA</title>

    <!-- Custom styles for this template-->

    <link href="<?php echo base_url('assets/css/styles.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/all.min.js') ?>" crossorigin="anonymous"></script>
    <!-- CSS untuk datatables-->
    <link href="<?php echo base_url('assets/dataTables/bulma.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/dataTables/jquery.dataTables.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/dataTables/buttons.dataTables.min.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/select2.min.css') ?>" rel="stylesheet">

    <style>
        .barcode {
            font-family: 'Libre Barcode 39', cursive;
            font-size: 45px;
            margin-top: -18px;
            margin-bottom: -10px;
            color: black;
        }
        #radioGroup .wrap {
          display: inline-block;
        }
        #radioGroup label {
          display: block;
          text-align: center;
          margin: 0 0.2em;
        }
        #radioGroup input[type="radio"] {
          display: block;
          margin: 0.5em auto;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a href="#" style="text-align: center; padding-left: 20px; color: white; size: 90px; font-weight: bold;">Penjualan Barang</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" style="padding-left: 30px" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form  class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div hidden class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <a class="btn btn-danger" style="margin: 3px" href="<?php echo site_url('login/loginController/logout') ?>" data-toggle="modal" data-backdrop="false" data-target="#logoutModal">Keluar</a>
            
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Admin</div>
                        <a class="nav-link" href="<?php echo site_url('Barang/Barang_Controller/dashboard') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                            Dashboard Laba/Rugi
                        </a>
                        <a class="nav-link" href="<?php echo site_url('Barang/Barang_Controller') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                            Kelola Barang
                        </a>
                        <a class="nav-link" href="<?php echo site_url('Supplier/Supplier_Controller') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                            Kelola Supplier
                        </a>
                        <a class="nav-link" href="<?php echo site_url('Pengguna/Pengguna_Controller') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Kelola Pengguna
                        </a>
                        <a class="nav-link" href="<?php echo site_url('Pelanggan/Pelanggan_Controller') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Kelola Pelanggan
                        </a>
                        <a class="nav-link" href="<?php echo site_url('Pembelian/Pembelian_Controller') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            Pembelian Barang
                        </a>
                        <a class="nav-link" href="<?php echo site_url('Penjualan/Penjualan_Controller') ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-shopping-cart"></i></div>
                            Penjualan Barang
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Masuk sebagai:</div>
                    <?php echo $this->session->userdata('NamaPengguna'); ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
            