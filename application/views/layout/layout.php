<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <?php if ($_SESSION['role'] == 'Admin') { ?>
        <title>Halaman Admin | Rekam Medis</title> <?php } else { ?>
        <title>Halaman Ho | Rekam Medis</title><?php } ?>

    <meta content="Admin Dashboard" name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?= base_url(); ?>assets/login/img/logo.png">

    <link href="<?= base_url(); ?>assets/plugins/animate/animate.css" rel="stylesheet" type="text/css">

    <!-- Plugins css -->
    <link href="<?= base_url(); ?>assets/plugins/timepicker/tempusdominus-bootstrap-4.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/plugins/clockpicker/jquery-clockpicker.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/plugins/colorpicker/asColorPicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url(); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/new_temp/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- DataTables -->
    <link href="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?= base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- dougnat chart -->
    <script src="<?= base_url(); ?>assets/new_temp/lib/chart-master/Chart.js"></script>

    <!-- dropify -->
    <link href="<?= base_url(); ?>assets/plugins/dropify/css/dropify.min.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="<?= base_url(); ?>assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

</head>


<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu" style="width: 250px;">
            <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="ion-close"></i>
            </button>

            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center bg-logo">
                    <?php if ($_SESSION['role'] == 'Admin') { ?>
                        <a href="<?= base_url(); ?>Admin" class="logo"><img src="<?= base_url(); ?>assets/login/img/logo.png" alt="logo" style="width: 15%;"> Rekam Medis</a>
                    <?php } else { ?>
                        <a href="<?= base_url(); ?>Ho" class="logo"><img src="<?= base_url(); ?>assets/login/img/logo.png" alt="logo" style="width: 15%;"> Rekam Medis</a>
                    <?php } ?>

                    <!-- <a href="index.html" class="logo"><img src="<?= base_url(); ?>assets/images/logo.png" height="24" alt="logo"></a> -->
                </div>
            </div>
            <div class="sidebar-user">
                <img src="<?= base_url(); ?>assets/profile/<?= $_SESSION['foto']; ?>" alt="user" class="rounded-circle img-thumbnail mb-1">
                <h6 class=""><?= $_SESSION['nama_karyawan'] ?> </h6>
                <p class=" online-icon text-dark"><i class="mdi mdi-record text-success"></i>online</p>
                <ul class="list-unstyled list-inline mb-0 mt-2">
                    <?php if ($_SESSION['role'] == 'Admin') { ?>
                        <li class="list-inline-item">
                            <a href="<?= base_url(); ?>Admin/Profile" class="" data-toggle="tooltip" data-placement="top" title="Profile"><i class="dripicons-user text-purple"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="<?= base_url(); ?>Admin/Setting" class="" data-toggle="tooltip" data-placement="top" title="Settings"><i class="dripicons-gear text-dark"></i></a>
                        </li>
                    <?php } else { ?>
                        <li class="list-inline-item">
                            <a href="<?= base_url(); ?>Ho/Profile" class="" data-toggle="tooltip" data-placement="top" title="Profile"><i class="dripicons-user text-purple"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="<?= base_url(); ?>Ho/Setting" class="" data-toggle="tooltip" data-placement="top" title="Settings"><i class="dripicons-gear text-dark"></i></a>
                        </li>
                    <?php } ?>

                    <li class="list-inline-item">
                        <a href="<?= base_url(); ?>Auth/logout" class="" data-toggle="tooltip" data-placement="top" title="Log out"><i class="dripicons-power text-danger"></i></a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-inner slimscrollleft">

                <div id="sidebar-menu">
                    <ul>
                        <!-- <li class="menu-title">Data Master</li> -->
                        <?php if ($_SESSION['role'] == 'Admin') { ?>
                            <li>
                                <a href="<?= base_url(); ?>Admin" class="waves-effect">
                                    <i class="dripicons-device-desktop"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li class="menu-title">Data Master</li>

                            <li>
                                <a href="<?= base_url(); ?>Admin/Jabatan" class="waves-effect">
                                    <i class="dripicons-suitcase"></i>
                                    <span> Data Jabatan</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url(); ?>Admin/Departement" class="waves-effect">
                                    <i class="dripicons-store"></i>
                                    <span> Data Departement</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url(); ?>Admin/Karyawan" class="waves-effect">
                                    <i class="dripicons-user-group"></i>
                                    <span> Data Karyawan</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url(); ?>Admin/User" class="waves-effect">
                                    <i class="dripicons-user"></i>
                                    <span> Data User</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url(); ?>Admin/KategoriObat" class="waves-effect">
                                    <i class="dripicons-archive"></i>
                                    <span> Data Kategori Obat</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url(); ?>Admin/Obat" class="waves-effect">
                                    <i class="dripicons-heart"></i>
                                    <span> Data Obat</span>
                                </a>
                            </li>

                            <li class="menu-title">Main Menu</li>

                            <li>
                                <a href="<?= base_url(); ?>Admin/Data_Kunjungan_Berobat" class="waves-effect">
                                    <i class="fas fa-ambulance"></i>
                                    <span> Data Kunjungan Berobat</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url(); ?>Admin/Surat_Keterangan_Dokter" class="waves-effect">
                                    <i class="far fa-envelope"></i>
                                    <span> Menu SKD</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url(); ?>Admin/Medical_Check_Up" class="waves-effect">
                                    <i class="dripicons-to-do"></i>
                                    <span> Menu MCU</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url(); ?>Admin/Data_Rekam_Medis" class="waves-effect">
                                    <i class="fas fa-briefcase-medical"></i>
                                    <span> Data Rekam Medis</span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-graph-bar"></i><span> Menu Laporan </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= base_url(); ?>Admin/Laporan_Rekam_Medis">Laporan Rekam Medis</a></li>
                                    <li><a href="<?= base_url(); ?>Admin/Laporan_Kunjungan_Pasien">Laporan Kunjungan Pasien</a></li>
                                    <li><a href="<?= base_url(); ?>Admin/Laporan_Medical_Check_Up">Laporan MCU</a></li>
                                </ul>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="<?= base_url(); ?>Ho" class="waves-effect">
                                    <i class="dripicons-device-desktop"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li class="menu-title">Menu Pelaporan</li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-graph-bar"></i><span> Menu Laporan </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= base_url(); ?>Ho/Laporan_Rekam_Medis">Laporan Rekam Medis</a></li>
                                    <li><a href="<?= base_url(); ?>Ho/Laporan_Kunjungan_Pasien">Laporan Kunjungan Pasien</a></li>
                                    <li><a href="<?= base_url(); ?>Ho/Laporan_Medical_Check_Up">Laporan MCU</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">

                        <ul class="list-inline float-right mb-0">
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="<?= base_url(); ?>assets/profile/<?= $_SESSION['foto']; ?>" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5>Welcome</h5>
                                    </div>
                                    <?php if ($_SESSION['role'] == 'Admin') { ?>
                                        <a class="dropdown-item" href="<?= base_url(); ?>Admin/Profile"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                        <a class="dropdown-item" href="<?= base_url(); ?>Admin/Setting"><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                                    <?php } else { ?>
                                        <a class="dropdown-item" href="<?= base_url(); ?>Ho/Profile"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                        <a class="dropdown-item" href="<?= base_url(); ?>Ho/Setting"><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                                    <?php } ?>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url(); ?>Auth/logout"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                </div>
                            </li>
                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left waves-light waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                        </ul>

                        <div class="clearfix"></div>
                    </nav>
                </div>
                <!-- Top Bar End -->

                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <?= $contents; ?>

                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            <footer class="footer">
                © 2022 Sistem Informasi Rekam Medis.
            </footer>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


    <!-- jQuery  -->
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/modernizr.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/detect.js"></script>
    <script src="<?= base_url(); ?>assets/js/fastclick.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.blockUI.js"></script>
    <script src="<?= base_url(); ?>assets/js/waves.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.nicescroll.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
    <!-- Chart JS -->
    <script src="<?= base_url(); ?>assets/plugins/chart.js/chart.min.js"></script>
    <script src="<?= base_url(); ?>assets/pages/dashboard.js"></script>
    <script src="<?= base_url(); ?>assets/pages/chartjs.init.js"></script>

    <!-- Required datatable js -->
    <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="<?= base_url(); ?>assets/pages/datatables.init.js"></script>

    <script src="<?= base_url(); ?>assets/pages/modal-animation.js"></script>

    <!-- Plugins Init js -->
    <script src="<?= base_url(); ?>assets/pages/form-advanced.js"></script>

    <!-- dropify -->
    <script src="<?= base_url(); ?>assets/plugins/dropify/js/dropify.min.js"></script>
    <script src="<?= base_url(); ?>assets/pages/dropify.init.js"></script>

    <!-- Sweet-Alert  -->
    <script src="<?= base_url(); ?>assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
    <script src="<?= base_url(); ?>assets/pages/sweet-alert.init.js"></script>

    <!-- App js -->
    <script src="<?= base_url(); ?>assets/js/app.js"></script>

    <!-- ################DISINI UNTUK SWEETALERT########################### -->
    <script src="<?= base_url(); ?>assets/sweetalert/swall.js"></script>

</body>

</html>