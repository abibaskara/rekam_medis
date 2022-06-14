<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Rekam Medis Karyawan</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>assets/login/img/logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="f<?= base_url(); ?>assets/login/ont/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/login/style.css">

    <!-- Sweet Alert -->
    <link href="<?= base_url(); ?>assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
    <div class="flash-data-info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
    <div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>
    <section class="fxt-template-animation fxt-template-layout33">
        <div class="fxt-content-wrap">
            <div class="fxt-heading-content">
                <div class="fxt-inner-wrap fxt-transformX-R-50 fxt-transition-delay-3">
                    <div class="fxt-transformX-R-50 fxt-transition-delay-10">
                        <a href="login-33.html" class="fxt-logo"><img src="<?= base_url(); ?>assets/login/img/logo.png" alt="Logo" style="width: 45%;"></a>
                    </div>
                    <div class="fxt-transformX-R-50 fxt-transition-delay-10">
                        <div class="fxt-middle-content">
                            <div class="fxt-sub-title">Welcome to</div>
                            <h1 class="fxt-main-title">Sistem Informasi Rekam Medis Karyawan.</h1>
                            <!-- <p class="fxt-description">We are glad to see you again! Get access to your Orders, Wishlist and Recommendations.</p> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="fxt-form-content">
                <div class="fxt-main-form">
                    <div class="fxt-inner-wrap fxt-opacity fxt-transition-delay-13">
                        <h2 class="fxt-page-title">Log In</h2>
                        <p class="fxt-description">Log In to Application</p>
                        <form action="<?= base_url('Auth/prosesLogin'); ?>" method="POST">
                            <div class="form-group">
                                <label for="email" class="fxt-label">Email Address</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Enter your email" required="required">
                            </div>
                            <div class="form-group">
                                <label for="password" class="fxt-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password" required="required">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="fxt-btn-fill">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jquery-->
    <script src="<?= base_url(); ?>assets/login/js/jquery-3.5.0.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= base_url(); ?>assets/login/js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="<?= base_url(); ?>assets/login/js/imagesloaded.pkgd.min.js"></script>
    <!-- Validator js -->
    <script src="<?= base_url(); ?>assets/login/js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="<?= base_url(); ?>assets/login/js/main.js"></script>

    <!-- Sweet-Alert  -->
    <script src="<?= base_url(); ?>assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
    <script src="<?= base_url(); ?>assets/pages/sweet-alert.init.js"></script>

    <!-- ################DISINI UNTUK SWEETALERT########################### -->
    <script src="<?= base_url(); ?>assets/sweetalert/swall.js"></script>

</body>

</html>