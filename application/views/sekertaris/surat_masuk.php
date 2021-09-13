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


</head>

<script type="text/javascript">
function tampilkanPreview(imagee,idpreview)
{
  var gb = imagee.files;
  for (var i = 0; i < gb.length; i++)
  {
    var gbPreview = gb[i];
    var imageType = /image.*/;
    var preview=document.getElementById(idpreview);
    var reader = new FileReader();
    if (gbPreview.type.match(imageType))
    {
      //jika tipe data sesuai
      preview.file = gbPreview;
      reader.onload = (function(element)
      {
        return function(e)
        {
          element.src = e.target.result;
        };
      })(preview);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview);
    }
      else
      {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
  }
}
</script>
</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="<?php echo base_url(); ?>index.php/sekertaris" class="logo-link nk-sidebar-logo">
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
                                    <a href="<?php echo base_url(); ?>index.php/sekertaris" class="nk-menu-link">
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
                                                    <div class="user-status user-status-unverified">Sekertaris</div>
                                                    <div class="user-name dropdown-indicator"><?= $user->username ?></div>
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
                                            <h3 class="nk-block-title page-title">Form Tambah Surat Masuk</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">                                                        
                                                        <li class="nk-block-tools-opt"><a href="<?php echo base_url(); ?>index.php/sekertaris" class="btn btn-primary"><em class="icon ni ni-arrow-left"></em><span>Kembali</span></a></li>
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
                                                    <h5 class="card-title">Tambah Surat Masuk</h5>
                                                </div>
                                                
                                                <ul>
                                                    <?php 
                                                    $errors = explode(',', validation_errors());

                                                    foreach ($errors as $error):
                                                    ?>
                                                    	<li class="text-danger mb-2"><?= $error ?> </li>
                                                    <?php endforeach; ?>
                                                </ul>

                                                <?php
                                                echo form_open_multipart('sekertaris/tambah') ?>
                                                    <br/>
                                                    <div class="row g-4">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <label class="form-label" for="outlined-normal">Nomor Berkas</label>
                                                                    <input type="text" class="form-control form-control-xl" id="outlined-normal" name="nomor_berkas" value="<?=set_value('nomor_berkas')?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <label class="form-label" for="outlined-normal">Asal Surat Masuk</label>
                                                                    <input type="text" class="form-control form-control-xl" id="outlined-normal" name="asal_sm" value="<?=set_value('asal_sm')?>">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <label class="form-label" for="outlined-normal">Nomor Surat Masuk</label>
                                                                    <input type="text" class="form-control form-control-xl" id="outlined-normal" name="nomor_sm" value="<?=set_value('nomor_sm')?>">
                                                                    
                                                                </div>
                                                            </div>
                                                          <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <label class="form-label" for="outlined-normal">Perihal</label>
                                                                    <input type="text" class="form-control form-control-xl" id="outlined-normal" name="perihal" value="<?=set_value('perihal')?>">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <label class="form-label" for="outlined-normal">Lampiran</label>
                                                                    <input type="text" class="form-control form-control-xl" id="outlined-normal" name="lampiran" value="<?=set_value('lampiran')?>">
                                                                    
                                                                </div>
                                                            </div>
                                                          <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <label class="form-label" for="outlined-date-picker">Tanggal Surat Masuk</label>
                                                                    <div class="form-icon form-icon-right">
                                                                        <em class="icon ni ni-calendar-alt"></em>
                                                                    </div>
                                                                    <input type="text" class="form-control form-control-xl  date-picker" id="outlined-date-picker" name="tanggal_masuk" value="<?=set_value('tanggal_masuk')?>">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <label class="form-label" for="outlined-select">Sifat Surat *</label>
                                                                    <select class="form-select form-control form-control-xl" data-ui="xl" id="outlined-select" name="id_ss">
                                                                        <option value="default_option">--Pilih--</option>
                                                                        <?php foreach($sifat_surat as $_ss): ?>
                                                                            <option value="<?= $_ss->id_ss ?>"><?= strtoupper($_ss->sifat_surat) ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                  
                                                                </div>
                                                            </div>
            
                                                        </div>
                                                        
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                     <label class="form-label" for="outlined-normal">Judul Surat</label>
                                                                    <input type="text" class="form-control form-control-xl form-control-outlined" id="outlined-normal" name="judul_surat" value="<?=set_value('judul_surat')?>">
                                                                   
                                                                </div>
                                                            </div>
                                                            <input type="file" name="imagee" id="imagee" onchange="tampilkanPreview(this,'preview')"/>
                                                                <br><b>Preview File</b><br>
                                                                <img id="preview" width="350px"/>

                                                        </div>

            
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">SIMPAN</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php echo form_close() ?>
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
