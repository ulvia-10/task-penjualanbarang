<?php  ?>
<html lang="en">

<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="noindex, nofollow">
    <title>AMT</title>

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
        <a href="#" style="text-align: center; padding-left: 20px; color: white; size: 90px; font-weight: bold;">Agent Management <br> Tool</a>
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
        <!-- <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo site_url('Ms_Pengguna/Ms_Pengguna_Controller/profilAgent/' . $this->session->userdata('id')) ?>">Profil</a></li>
                    <li><a class="dropdown-item" href="<?php echo site_url('Gantipass/Gantipass_Controller/profilAgent/' . $this->session->userdata('id')) ?>">Ganti Password</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="<?php echo site_url('login/loginController/logout') ?>" data-toggle="modal" data-backdrop="false" data-target="#logoutModal">Keluar</a></li>
                </ul>
            </li>
        </ul> -->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <a class="btn btn-success" style="margin: 3px" href="<?php echo site_url('Ms_Pengguna/Ms_Pengguna_Controller/profilAgent/' . $this->session->userdata('id')) ?>">Profil</a>
            <a class="btn btn-warning" style="margin: 3px" href="<?php echo site_url('Gantipass/Gantipass_Controller/profilAgent/' . $this->session->userdata('id')) ?>">Ganti Password</a>
            <a class="btn btn-danger" style="margin: 3px" href="<?php echo site_url('login/loginController/logout') ?>" data-toggle="modal" data-backdrop="false" data-target="#logoutModal">Keluar</a>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="<?php echo site_url('Tr_Data_Kerja_Cdb/Tr_Data_Kerja_Cdb_Controller/dashboardAgent') ?>">
                            <div class="sb-nav-link-icon"><<i class="fas fa-chart-area"></i></div>
                            Dashboard
                        </a>
                        <hr>
                        <a class="nav-link collapsed" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                            CDB Verifikasi
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        
                            <a class="nav-link" href="<?php echo site_url('Tr_Data_Kerja_Cdb/Tr_Data_Kerja_Cdb_Controller/indexAgent') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Data Kerja CDB
                            </a>
                            <a class="nav-link" href="<?php echo site_url('Tr_Data_Kerja_Cdb/Tr_Data_Kerja_Cdb_Controller/cdbVerifiedAgent') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-check-square"></i></div>
                                Hasil Kerja CDB
                            </a>
                        <hr>
<!--                         <a class="nav-link" href="<?php echo site_url('Tr_Data_Kerja_Cdb/Tr_Data_Kerja_Cdb_Controller/indexAgent') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                            CDB Verifikasi
                        </a> -->
                        <a class="nav-link" href="<?php echo site_url('Tr_Data_Kerja_Csl/Tr_Data_Kerja_Csl_Controller/indexAgent') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Survey Konsumen
                        </a>
                        <a class="nav-link" href="<?php echo site_url('Tr_Data_Qc_H1/Tr_Data_Qc_H1_Controller/indexAgent') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            QC Survey H1
                        </a>
                        <a class="nav-link" href="<?php echo site_url('Tr_Data_Qc_H2/Tr_Data_Qc_H2_Controller/indexAgent') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            QC Survey H2
                        </a>
                        <a class="nav-link" href="<?php echo site_url('Tr_Data_Qc_H3/Tr_Data_Qc_H3_Controller/indexAgent') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            QC Survey H3
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Masuk sebagai:</div>
                    <?php echo $this->session->userdata('name'); ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
            