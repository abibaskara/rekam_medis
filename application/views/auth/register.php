<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Login | Rekam Medis Karyawan</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">


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

</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">

                <div class="text-center m-b-15">
                    <a href="index.html" class="logo logo-admin"><img src="<?= base_url(); ?>assets/images/logo.png" height="24" alt="logo"></a>
                </div>

                <div class="p-3">
                    <form class="form-horizontal" action="index.html">

                        <div class="form-group row">
                            <div class="col-12">
                                <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                                    <option value="1">1</option>
                                    <option value="12">13</option>
                                    <option value="13">12</option>
                                </select>
                                <input class="form-control" type="email" required="" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="text" required="" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="password" required="" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label font-weight-normal" for="customCheck1">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Register</button>
                            </div>
                        </div>

                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20 text-center">
                                <a href="pages-login.html" class="text-muted">Already have account?</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <!-- jQuery  -->
    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
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

    <!-- Plugins js -->
    <script src="<?= base_url(); ?>assets/plugins/timepicker/moment.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/clockpicker/jquery-clockpicker.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/colorpicker/jquery-asColor.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/colorpicker/jquery-asGradient.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/colorpicker/jquery-asColorPicker.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/select2/select2.min.js"></script>

    <script src="<?= base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Plugins Init js -->
    <script src="<?= base_url(); ?>assets/pages/form-advanced.js"></script>

    <!-- App js -->
    <script src="<?= base_url(); ?>assets/js/app.js"></script>

</body>

</html>