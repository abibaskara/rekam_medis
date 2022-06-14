<div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-data-info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Karyawan</li>
                </ol>
            </div>
            <h4 class="page-title">Data Karyawan</h4>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 style="text-align: center;">Data Karyawan</h4>
                        <hr>
                        <button class="btn btn-success btn-theme03 btn-animation" data-toggle="modal" data-animation="rubberBand" data-target="#tambah">
                            <i class="fas fa-plus-square"></i> &nbsp Tambah Data Karyawan
                        </button>

                        <div class="row" style="margin-top: 20px;">
                            <table id="karyawan" class="table table-bordered nowrap outage-report" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">NO.</th>
                                        <th class="text-center">NIK</th>
                                        <th class="text-center">NAMA KARYAWAN</th>
                                        <th class="text-center">JABATAN</th>
                                        <th class="text-center">DEPARTEMENT</th>
                                        <th class="text-center">JENIS KELAMIN</th>
                                        <th class="text-center">TEMPAT LAHIR</th>
                                        <th class="text-center">ALAMAT</th>
                                        <th class="text-center">NO HP</th>
                                        <th class="text-center"> ACTION </th>
                                    </tr>
                                </thead>
                                <tbody class="example">
                                    <?php $no = 1;
                                    foreach ($karyawan as $row) {
                                    ?>
                                        <tr>
                                            <td align="center"><?= $no++; ?></td>
                                            <td align="center"><?= $row->nik; ?></td>
                                            <td align="center"><?= $row->nama_karyawan; ?></td>
                                            <td align="center"><?= $row->nama_jabatan; ?></td>
                                            <td align="center"><?= $row->nama_departement; ?></td>
                                            <td align="center"><?= $row->jk; ?></td>
                                            <td align="center"><?= $row->tempat_lahir; ?></td>
                                            <td align="center"><?= date('d-m-Y', strtotime($row->tgl_lahir)); ?></td>
                                            <td align="center"><?= $row->alamat; ?></td>
                                            <td align="center" style="color: #73e600;">
                                                <a href="#update<?= $row->id_karyawan ?>" data-toggle="modal" class="btn-animation" data-animation="rubberBand"> <button class="btn btn-primary" title="Edit"><i class="ti-pencil-alt"></i></button></a>
                                                <a href="#delete<?= $row->id_karyawan ?>" data-toggle="modal" class="btn-animation" data-animation="rubberBand"> <button class="btn btn-danger" title="Delete"><i class="ti-trash"></i></button> </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ##########################MODAL################################ -->
<div class="modal animation-modal fade" id="tambah" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle-1">Tambah Data Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url() ?>Admin/tambahKaryawan" enctype="multipart/form-data" class="cmxform form-horizontal style-form">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <label for="nik" class="control-label">NIK<br>
                            </label>
                            <input class="form-control" id="nik" name="nik" type="text" required autocomplete="off">
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="nama_karyawan" class="control-label">Nama Karyawan<br>
                            </label>
                            <input class="form-control" id="nama_karyawan" name="nama_karyawan" type="text" required autocomplete="off">
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="id_jabatan" class="control-label">Jabatan<br>
                            </label>
                            <select class="select2 form-control mb-3 custom-select" id="id_jabatan" name="id_jabatan" style="width: 100%; height:36px;" required>
                                <option>Select a Jabatan</option>
                                <?php foreach ($jabatan as $raw) { ?>
                                    <option value="<?= $raw->id_jabatan ?>"><?= $raw->nama_jabatan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="id_departement" class="control-label">Departement<br>
                            </label>
                            <select class="select2 form-control mb-3 custom-select" id="id_departement" name="id_departement" style="width: 100%; height:36px;" required>
                                <option>Select a Departement</option>
                                <?php foreach ($departement as $key) { ?>
                                    <option value="<?= $key->id_departement ?>"><?= $key->nama_departement ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="jk" class="control-label">Jenis Kelamin<br>
                            </label>
                            <select class="select2 form-control mb-3 custom-select" id="jk" name="jk" style="width: 100%; height:36px;" required>
                                <option>Select a Jenis Kelamin</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="tempat_lahir" class="control-label">Tempat Lahir<br>
                            </label>
                            <input class="form-control" id="tempat_lahir" name="tempat_lahir" type="text" required autocomplete="off">
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="tgl_lahir" class="control-label">Tanggal Lahir<br>
                            </label>
                            <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" required autocomplete="off" />
                            <!-- <input class="form-control" id="tgl_lahir" name="tgl_lahir" type="text" required autocomplete="off"> -->
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="alamat" class="control-label">Alamat<br>
                            </label>
                            <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="no_hp" class="control-label">No Hp<br>
                            </label>
                            <input class="form-control" id="no_hp" name="no_hp" type="text" required autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="ti-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($karyawan as $row) { ?>
    <div class="modal animation-modal fade" id="update<?= $row->id_karyawan ?>" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle-1">Edit Data Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url() ?>Admin/editKaryawan" enctype="multipart/form-data" class="cmxform form-horizontal style-form">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mt-2">
                                <label for="nik" class="control-label">nik<br>
                                </label>
                                <input type="hidden" name="id" value="<?= $row->id_karyawan ?>">
                                <input class="form-control" id="nik" name="nik" type="text" required autocomplete="off" value="<?= $row->nik ?>">
                            </div>
                            <div class="col-lg-12 mt-2">
                                <label for="nama_karyawan" class="control-label">Nama Karyawan<br>
                                </label>
                                <input class="form-control" id="nama_karyawan" name="nama_karyawan" type="text" required autocomplete="off" value="<?= $row->nama_karyawan ?>">
                            </div>
                            <div class="col-lg-12 mt-2">
                                <label for="id_jabatan_edit" class="control-label">Jabatan<br>
                                </label>
                                <select class="select2 form-control mb-3 custom-select" id="id_jabatan_edit" name="id_jabatan_edit" style="width: 100%; height:36px;" required>
                                    <option>Select a Jabatan</option>
                                    <?php foreach ($jabatan as $raw) { ?>
                                        <option value="<?= $raw->id_jabatan ?>" <?= $raw->id_jabatan == $row->id_jabatan ? 'selected' : '' ?>><?= $raw->nama_jabatan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <label for="id_departement" class="control-label">Departement<br>
                                </label>
                                <select class="select2 form-control mb-3 custom-select" id="id_departement" name="id_departement" style="width: 100%; height:36px;" required>
                                    <option>Select a Departement</option>
                                    <?php foreach ($departement as $key) { ?>
                                        <option value="<?= $key->id_departement ?>" <?= $key->id_departement == $row->id_departement ? 'selected' : '' ?>><?= $key->nama_departement ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <label for="jk" class="control-label">Jenis Kelamin<br>
                                </label>
                                <select class="select2 form-control mb-3 custom-select" id="jk" name="jk" style="width: 100%; height:36px;" required>
                                    <option>Select</option>
                                    <option value="Pria" <?= $row->jk == 'Pria' ? 'selected' : '' ?>>Pria</option>
                                    <option value="Wanita" <?= $row->jk == 'Wanita' ? 'selected' : '' ?>>Wanita</option>
                                </select>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <label for="tempat_lahir" class="control-label">Tempat Lahir<br>
                                </label>
                                <input class="form-control" id="tempat_lahir" name="tempat_lahir" type="text" required autocomplete="off" value="<?= $row->tempat_lahir ?>">
                            </div>
                            <div class="col-lg-12 mt-2">
                                <label for="tgl_lahir" class="control-label">Tanggal Lahir<br>
                                </label>
                                <input type="text" class="form-control" name="tgl_lahir" id="edit_tgl_lahir" placeholder="Tanggal Lahir" value="<?= date('d-m-Y', strtotime($row->tgl_lahir)) ?>" required autocomplete="off" />
                            </div>
                            <div class="col-lg-12 mt-2">
                                <label for="alamat" class="control-label">Alamat<br>
                                </label>
                                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"><?= $row->alamat ?></textarea>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <label for="no_hp" class="control-label">No Hp<br>
                                </label>
                                <input class="form-control" id="no_hp" name="no_hp" type="text" required autocomplete="off" value="<?= $row->no_hp ?>">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="ti-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<?php foreach ($karyawan as $row) { ?>
    <div class="modal animation-modal fade" id="delete<?= $row->id_karyawan ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle-1">Delete Nama Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Admin/deleteKaryawan') ?>" method="POST">
                    <div class="modal-body">
                        <div class="p-h-10">
                            <div class="form-group text-center">
                                <i class="fa fa-trash" style="color: red;"></i>
                                <label class="control-label">Anda Yakin Ingin Menghapus Data?</label>
                                <input id="id" type="hidden" name="id" value="<?= $row->id_karyawan ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger">Yes, delete it!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<!-- ##########################SCRIPT PENDUKUNG########################## -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

<script src="<?= base_url(); ?>assets/plugins/select2/select2.min.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url(); ?>assets/pages/datatables.init.js"></script>

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
    $('#id_jabatan').select2({
        placeholder: "Select a Jabatan",
        allowClear: true,
    });

    $('#id_jabatan_edit').select2({
        placeholder: "Select a Jabatan",
        allowClear: true,
    });

    $('#id_departement').select2({
        placeholder: "Select a Departement",
        allowClear: true,
    });

    $('#karyawan').DataTable({
        scrollX: true,
        scrollY: 200,
    });

    $('#tgl_lahir').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false,
        format: 'DD-MM-YYYY'
    });
</script>