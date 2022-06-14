<div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-data-info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>Ho">Dashboard</a></li>
                    <li class="breadcrumb-item active">My Profile</li>
                </ol>
            </div>
            <h4 class="page-title">My Profile</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">My Profile</h4>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Edit Profile</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active p-3" id="overview" role="tabpanel">
                        <div class="row">
                            <div class="col-12">
                                <div class="card bg-gradient2 text-white" style="height: 95%;">
                                    <div class="card-body">
                                        <div class="d-sm-flex align-self-center">
                                            <img src="<?= base_url(); ?>assets/profile/<?= $_SESSION['foto']; ?>" alt="" class="thumb-lg rounded-circle">
                                            <div class="media-body ml-2 align-self-center">
                                                <p class="mb-0"><?= $profile['nama_karyawan']; ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <table style="width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        NIK
                                                    </td>
                                                    <td>
                                                        : <?= $profile['nik']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Jenis Kelamin
                                                    </td>
                                                    <td>
                                                        : <?= $profile['jk']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Tempat Lahir
                                                    </td>
                                                    <td>
                                                        : <?= $profile['tempat_lahir']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Tanggal Lahir
                                                    </td>
                                                    <td>
                                                        : <?= date('d-m-Y', strtotime($profile['tgl_lahir'])); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Alamat
                                                    </td>
                                                    <td>
                                                        : <?= $profile['alamat']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        No Phone
                                                    </td>
                                                    <td>
                                                        : <?= $profile['no_hp']; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane p-3" id="profile" role="tabpanel">
                        <h4 class="mt-0 header-title" style="text-align:center;">Edit Data Information</h4>
                        <hr>
                        <form role="form" action="<?= base_url() ?>Ho/updateProfile" enctype="multipart/form-data" method="POST" class="form-horizontal">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?= $profile['id_karyawan'] ?>">
                                    <input class="form-control" type="text" value="<?= $profile['nik']; ?>" id="example-text-input" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Nama Karyawan</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?= $profile['nama_karyawan']; ?>" id="example-text-input" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select class="select2 form-control mb-3 custom-select" id="jk" name="jk" style="width: 100%; height:36px;" required>
                                        <option>Select a Jenis Kelamin</option>
                                        <option value="Pria" <?= $profile['jk'] == 'Pria' ? 'selected' : '' ?>>Pria</option>
                                        <option value="Wanita" <?= $profile['jk'] == 'Wanita' ? 'selected' : '' ?>>Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?= $profile['tempat_lahir']; ?>" name="tempat_lahir" id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?= date('d-m-Y', strtotime($profile['tgl_lahir'])); ?>" id="tgl_lahir" name="tgl_lahir" id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea name="alamat" cols="30" rows="10" class="form-control"><?= $profile['alamat'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">No Handphone</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="no_hp" value="<?= $profile['no_hp']; ?>" id="example-text-input">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">

                                </div>
                                <div class="col-sm-10">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- ##########################SCRIPT PENDUKUNG########################## -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

<script src="<?= base_url(); ?>assets/plugins/select2/select2.min.js"></script>

<!-- Plugins js -->
<script src="<?= base_url(); ?>assets/plugins/timepicker/moment.js"></script>
<script src="<?= base_url(); ?>assets/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
<script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
<script src="<?= base_url(); ?>assets/plugins/clockpicker/jquery-clockpicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/colorpicker/jquery-asColor.js"></script>
<script src="<?= base_url(); ?>assets/plugins/colorpicker/jquery-asGradient.js"></script>
<script src="<?= base_url(); ?>assets/plugins/colorpicker/jquery-asColorPicker.min.js"></script>

<script src="<?= base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

<script>
    $('#jk').select2({
        placeholder: "Select a Jenis Kelamin",
        allowClear: true,
    });

    $('#tgl_lahir').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false,
        format: 'DD-MM-YYYY'
    });
</script>