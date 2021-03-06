<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/gambar/kominfo.jpg">
    <!-- Page Title  -->
    <title>DISKOMINFO | DISPOSISI SURAT</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashlite.min.css?ver=2.2.0">
    <link id="skin-default" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme.css?ver=2.2.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .select2-selection__rendered {
        padding: 10px !important;
    }
    </style>
</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="<?php echo base_url(); ?>index.php/kadis" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="<?php echo base_url(); ?>assets/gambar/kominfo.jpg" srcset="<?php echo base_url(); ?>assets/gambar/kominfo.jpg" alt="logo">
                            <img class="logo-dark logo-img" src="<?php echo base_url(); ?>assets/gambar/kominfo.jpg" srcset="<?php echo base_url(); ?>assets/gambar/kominfo.jpg" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="<?php echo base_url(); ?>assets/gambar/kominfo.jpg" srcset="./images/logo-small2x.png 2x" alt="logo-small">
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
                                    <a href="<?php echo base_url(); ?>index.php/kadis" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tag-alt-fill"></em></span>
                                        <span class="nk-menu-text">Surat Masuk</span>
                                    </a>
                                </li>
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
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-xl-block">
                                                    <div class="user-status user-status-unverified">Kadis</div>
                                                    <div class="user-name dropdown-indicator"><?= $user->nama ?></div>
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
                                                        <span class="lead-text"><?= $user->nama ?></span>
                                                        <span class="sub-text"><?= $user->email ?></span>
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
                                            <h3 class="nk-block-title page-title">Form Disposisi</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">                                                        
                                                        <li class="nk-block-tools-opt"><a href="<?php echo base_url(); ?>index.php/kadis" class="btn btn-primary"><em class="icon ni ni-arrow-left"></em><span>Kembali</span></a></li>
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
                                                    <h5 class="card-title">Disposisi Surat</h5>
                                                </div>
                                                <form action="<?php echo base_url(); ?>index.php/kadis/tambah" method="post">
                                                    <div class="row g-4">
                                                        <?php echo validation_errors(); ?>
                                                       
                                                        <div class="col-lg-6">
                                                            <div class="form-group">

                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-xl form-control-outlined" id="outlined-normal " name="instruksi" value="<?=set_value('instruksi')?>">
                                                                    <label class="form-label-outlined" for="outlined-normal">Instruksi</label>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select form-control form-control-xl" data-ui="xl" id="field__id-sm" name="id_sm">
                                                                        <option value="">--Pilih--</option>
                                                                        <?php foreach($sekertaris as $seker): ?>
																			<?php if (isset($_GET['id_sm']) && $_GET['id_sm'] == $seker->id_sm): ?>
																				<option value="<?= $seker->id_sm ?>" selected><?= $seker->perihal ?></option>
																			<?php endif; ?>
                                                                            <option value="<?= $seker->id_sm ?>"><?= $seker->perihal ?></option>
                                                                        <?php endforeach; ?>                                                                </select>
                                                                    <label class="form-label-outlined" for="outlined-select">Judul Surat Masuk</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select multiple class="form-select form-control form-control-xl" data-ui="xl" id="outlined-select" name="id_pegawai[]">
                                                                        <option value="default_option">--Pilih--</option>
                                                                        <?php foreach($pegawai as $peg): ?>
                                                                            <?php if ($peg->id_user == $userId) {
                                                                                    continue;
                                                                                }
                                                                            ?>
                                                                            
                                                                            <option value="<?= $peg->id_pegawai ?>" option_select_name"><?= $peg->nama_jabatan ?> </option>
                                                                        <?php endforeach; ?>                                                                </select>
                                                                    <label class="form-label-outlined" for="outlined-select">ID Pegawai</label>
                                                                </div>
                                                                
                                                            </div>

															<div class="form-group">
                                                                <label class="form-label" for="outlined-date-picker">Batas waktu</label>
                                                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                                                    <input type="text" name="tanggal_expire" class="form-control-xl form-control datetimepicker-input" value="<?=set_value('tanggal_expire')?>" data-target="#datetimepicker1"/>
                                                                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                                        <div class="input-group-text bg-white"><i class="icon ni ni-calendar-alt"></i></div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6">
                                                            <img id="preview_image" style="border-radius: 4px; width: 400px; object-fit: auto;" />
                                                        </div>
                                                    </div>                                                       
                                                    <div class="row mt-3">
														<div class="col-12">
															<div class="form-group">
																<button type="submit" class="btn btn-lg btn-primary">Mulai disposisi</button>
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
    <script src="<?php echo base_url(); ?>assets/js/bundle.js?ver=2.2.0"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js?ver=2.2.0"></script>
    <script src="<?php echo base_url(); ?>assets/js/charts/chart-ecommerce.js?ver=2.2.0"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>          
	
    <script>
        $(document).ready(() => {
			
			$('#datetimepicker1').datetimepicker({
				format: 'YYYY-MM-DD H:mm:ss',
				icons: {
					time: "icon ni ni-clock-fill",
					date: "icon ni ni-calendar-alt",
					up: "icon ni ni-sort-up-fill",
					down: "icon ni ni-sort-down-fill"
				}
			});
			
            $('#field__id-sm').on('change', function () {
                const val = $(this).val();
            
                $.get(window.location.origin + '/disposisi/index.php/kadis/show/' + val, (data) => {
                    if (data.length == 0) {
                        alert('Nomor surat tidak valid');
                        return;
                    }

                    const sm = data[0];
                    const src = window.location.origin + '/disposisi/assets/gambar/' + sm['gambar'];
                    
                    $('#preview_image').attr('src', src);
                });
            })
        });
    </script>
</body>

</html>
