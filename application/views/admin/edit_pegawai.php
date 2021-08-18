<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png">
    <!-- Page Title  -->
    <title>Default Dashboard | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashlite.min.css?ver=2.2.0">
    <link id="skin-default" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme.css?ver=2.2.0">
</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="html/index.html" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="<?php echo base_url(); ?>assets/images/logo.png" srcset="<?php echo base_url(); ?>assets/images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="<?php echo base_url(); ?>assets/images/logo-dark.png" srcset="<?php echo base_url(); ?>assets/images/logo-dark2x.png 2x" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="<?php echo base_url(); ?>assets/images/logo-small.png" srcset="./images/logo-small2x.png 2x" alt="logo-small">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
               <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Master Data</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo base_url(); ?>index.php/pegawai" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-cart-fill"></em></span>
                                        <span class="nk-menu-text">Data Pegawai</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo base_url(); ?>index.php/bidang" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-activity-round-fill"></em></span>
                                        <span class="nk-menu-text">Data Bidang</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo base_url(); ?>index.php/sie" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span>
                                        <span class="nk-menu-text">Data Sie</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo base_url(); ?>index.php/user" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-alert-circle-fill"></em></span>
                                        <span class="nk-menu-text">Data User</span>
                                    </a>
                                </li><!-- .nk-menu-item -->

                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-search ml-3 ml-xl-0">
                                <em class="icon ni ni-search"></em>
                                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search anything">
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">

                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-xl-block">
                                                    <div class="user-status user-status-unverified">Verified</div>
                                                    <div class="user-name dropdown-indicator">Admin</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">Mizwar</span>
                                                        <span class="sub-text">mizwar0201@gmail.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    
                                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="<?php echo base_url(); ?>index.php/login/logout"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Form Edit Pegawai</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li>
                                                            
                                                        </li>
                                                        <li class="nk-block-tools-opt"><a href="<?php echo base_url(); ?>index.php/pegawai" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Kembali</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <!-- Content -->

                                <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                        </div>
                                        <div class="card">
                                            <div class="card-inner">
                                                <div class="card-head">
                                                    <h5 class="card-title">Edit Pegawai</h5>
                                                </div>
                                                <form action="<?php echo base_url(); ?>index.php/pegawai/update/<?= $row->id_pegawai ?>" method="post">
                                                <?= validation_errors() ?>
                                                    <div class="row g-4">
                                                       
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="form-label-group">
                                                                <label class="form-label" for="default-01">Nama Jabatan *</label>
                                                                </div>
                                                                <input type="text" class="form-control form-control-lg" id="default-01" value="<?=$this->input->post('nama_jabatan') ?? $row->nama_jabatan ?>" name="nama jabatan"> 
                                                            </div><!-- .foem-group -->
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select form-control form-control-xl" data-ui="xl" id="outlined-select" name="id_bidang">
                                                                        <option value="default_option">--Pilih--</option>
                                                                        <?php foreach($bidang as $_bidang): ?>
                                                                            <option value="<?= $_bidang->id_bidang ?>" <?= $_bidang->id_bidang == $row->id_bidang ? 'selected' : '' ?>><?= $_bidang->nama_bidang ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <label class="form-label-outlined" for="outlined-select">ID bidang *</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="form-label-group">
                                                                <label class="form-label" for="default-01">NIP *</label>
                                                                </div>
                                                                <input type="text" class="form-control form-control-lg" id="default-01" name="nip" value="<?=$this->input->post('nip') ?? $row->nip ?>" placeholder="123456">
                                                            </div><!-- .foem-group -->
                                                          <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select form-control form-control-xl" data-ui="xl" id="outlined-select" name="id_user">
                                                                        <option value="default_option">--Pilih--</option>
                                                                        <?php foreach($users as $user): ?>
     
                                                                        <option value="<?= $user->id_user ?>" <?= $user->id_user == $row->id_user ? 'selected' : '' ?> > <?= $user->nama ?></option>
                                                                        <?php endforeach; ?>

                                                                    </select>
                                                                    <label class="form-label-outlined" for="outlined-select">ID User *</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                         
                                                          <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select form-control form-control-xl" data-ui="xl" id="outlined-select" name="id_sie">
                                                                        <option value="default_option">--Pilih--</option>
                                                                        <?php foreach($sie as $_sie): ?>
     
                                                                        <option value="<?= $_sie->id_sie ?>" <?= $_sie->id_sie == $row->id_sie ? 'selected' : '' ?> > <?= $_sie->nama_sie ?></option>
                                                                        <?php endforeach; ?>

                                                                    </select>
                                                                    <label class="form-label-outlined" for="outlined-select">ID Sie *</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                        </div>
                                                        </div><!-- .foem-group -->
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">SIMPAN</button>
                                                                <button type="reset" class="btn btn-lg btn-primary">Reset</button>
                                                            </div>
                                                        </div>
                                            
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>

                                <!-- Content End -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2020 DashLite. Template by <a href="https://softnio.com" target="_blank">Softnio</a>
                            </div>
                            <div class="nk-footer-links">
                                <ul class="nav nav-sm">
                                    <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js?ver=2.2.0"></script>
    <script src="<?php echo base_url(); ?>assets/js/charts/chart-ecommerce.js?ver=2.2.0"></script>
</body>

</html>