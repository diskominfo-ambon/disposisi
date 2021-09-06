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
                                    <a href="<?php echo base_url(); ?>index.php/kabid" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tag-alt-fill"></em></span>
                                        <span class="nk-menu-text">Surat Masuk</span>
                                    </a>
                                </li>

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
                                                    <div class="user-status user-status-unverified">Kabid</div>
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
                                            <h3 class="nk-block-title page-title">Disposisi Surat</h3>

                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <!-- Content -->
                                <ul class="nav nav-tabs ml-1">
                                    <li class="nav-item">
                                        <a class="nav-link <?= $order == '' ? 'active' : '' ?>" href="<?php echo base_url(); ?>index.php/kabid">Disposisi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= $order == 'finish' ? 'active' : '' ?>" href="<?php echo base_url(); ?>index.php/kabid?order=finish">Laporan</a>
                                    </li>
                                </ul>

                                <div class="nk-block nk-block-lg">

                                    <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
                                        <thead>
                                            <tr class="nk-tb-item nk-tb-head">
                                                <th class="nk-tb-col tb-col-sm"><span>#</span></th>
                                                <th class="nk-tb-col tb-col-sm"><span>Nomor Berkas</span></th>
                                                <th class="nk-tb-col tb-col-sm"><span>Tanggal Masuk</span></th>
                                                <th class="nk-tb-col tb-col-sm"><span>Tanggal Expire</span></th>
                                                <th class="nk-tb-col tb-col-sm"><span>Nomor Surat Masuk</span></th>
                                                <th class="nk-tb-col tb-col-sm"><span>Asal Surat Masuk</span></th>
                                                <th class="nk-tb-col tb-col-sm"><span>Perihal</span></th>
                                                <th class="nk-tb-col tb-col-sm"><span>Sifat Surat</span></th>
                                                <th class="nk-tb-col tb-col-sm"><span>status</span></th>
                                                <th class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1 my-n1">
                                                        <li class="mr-n1">
                                                            <p>Action</p>
                                                        </li>
                                                    </ul>
                                                </th>
                                            </tr><!-- .nk-tb-item -->
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($row as $data) { ?>
                                                <tr class="nk-tb-item">
                                                    <td class="nk-tb-col">
                                                        <span class="tb-sub"><?= $no++ ?>.</span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span class="tb-sub"><?= $data->nomor_berkas ?></span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span class="tb-sub"><?= $data->tanggal_masuk ?></span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span class="tb-sub"><?= $data->tanggal_expire ?></span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span class="tb-sub"><?= $data->nomor_sm ?></span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span class="tb-sub"><?= $data->asal_sm ?></span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span class="tb-sub"><?= $data->perihal ?></span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span class="tb-sub"><?= $data->sifat_surat ?></span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span class="tb-sub"><?= $data->status ?></span>
                                                    </td>
                                                    <td class="nk-tb-col nk-tb-col-tools">
                                                        <ul class="nk-tb-actions gx-1 my-n1">
                                                            <li class="mr-n1">
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <ul class="link-list-opt no-bdr">


                                                                            <li>
                                                                                <a data-id-sm="<?= $data->id_sm ?>" data-image-src="<?= base_url('assets/gambar/' . $data->gambar) ?>" class="button__img-preview btn__traking" href="javascript:void(0);" data-toggle="modal" data-target="#modalDefault"><em class="icon ni ni-eye"></em> Lacak</a>
                                                                            </li>



                                                                            <?php if ($order == '') : ?>



                                                                                <li>
                                                                                    <a href="<?php echo base_url() ?>index.php/kabid/tambah?id_sm=<?= $data->id_sm ?>">
                                                                                        <em class="icon ni ni-edit"></em>
                                                                                        <span>Disposisi</span>
                                                                                    </a>
                                                                                </li>

                                                                                <li>
                                                                                    <a href="<?php echo base_url() ?>index.php/kasie/laporan?id_sm=<?= $data->id_sm ?>">
                                                                                        <em class="icon ni ni-edit"></em>
                                                                                        <span>Buat laporan</span>
                                                                                    </a>
                                                                                </li>



                                                                            <?php endif; ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr><!-- .nk-tb-item -->

                                            <?php
                                            } ?>
                                        </tbody>
                                    </table><!-- .nk-tb-list -->

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

    <!-- Modal Content Code -->

    <div class="modal fade" tabindex="-1" id="modalDefault">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Gambar</h5>
                </div>
                <div class="modal-body">
                    <div class="timeline">
                        <ul class="timeline-list" id="timeline-list">
                            <li class="timeline-item">
                                <div class="timeline-status bg-primary is-outline"></div>
                                <div class="timeline-date">13 Nov <em class="icon ni ni-alarm-alt"></em></div>
                                <div class="timeline-data">
                                    <h6 class="timeline-title">Submited KYC Application</h6>
                                    <div class="timeline-des">
                                        <p>Re-submitted KYC Application form.</p>
                                        <span class="time">09:30am</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bundle.js?ver=2.2.0"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js?ver=2.2.1"></script>
    <script src="<?php echo base_url(); ?>assets/js/charts/chart-ecommerce.js?ver=2.2.0"></script>

    <script>
        $(document).ready(() => {

            function renderTimelineList(data) {
                const date = new Date(data.tanggal);
                const dateFull = new Intl.DateTimeFormat('id-ID', {
                    dateStyle: 'full',
                    timeStyle: 'short'
                }).format(date);
                const dateShort = new Intl.DateTimeFormat('id-ID', {
                    dateStyle: 'short'
                }).format(date);

                return `
                    <li class="timeline-item">
                        <div class="timeline-status bg-primary is-outline"></div>
                        <div class="timeline-date">${dateShort} <em class="icon ni ni-alarm-alt"></em></div>
                        <div class="timeline-data">
                            <h6 class="timeline-title">${data.instruksi}</h6>
                            <div class="timeline-des">
                                <p>${data.nama_jabatan} - ${data.nama}</p>
                                 <span class="time">${dateFull}</span>
                            </div>
                        </div>
                    </li>
                `;
            }

            $('.btn__traking').click(function() {
                const idSm = $(this).data().idSm;

                const uri = `${window.location.origin}/disposisi/index.php/tracking/ajax_tracking/${idSm}`;
                console.log({
                    uri
                });

                fetch(uri)
                    .then(res => res.json())
                    .then(({
                        success,
                        data: payload
                    }) => {
                        // data history.
                        console.log({
                            success,
                            payload
                        });

                        if (!success) {
                            alert('Terjadi keslahan memuat!');
                            return;
                        }

                        const html = payload.map(data => {
                            return renderTimelineList(data);
                        });

                        $('#timeline-list').html(html.join(''));

                        // luncurkan modal.
                        $('#modalDefault').modal();
                    })



            });
            // $('.button__img-preview').click(function () {
            //     const {imageSrc} = $(this).data();

            //     $('#modal__img-preview').attr('src', imageSrc);

            // })
        });
    </script>
</body>

</html>