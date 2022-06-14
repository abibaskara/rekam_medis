<div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-data-info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Obat</li>
                </ol>
            </div>
            <h4 class="page-title">Data Obat</h4>
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
                        <h4 style="text-align: center;">Data Obat</h4>
                        <hr>
                        <button class="btn btn-success btn-theme03 btn-animation" data-toggle="modal" data-animation="rubberBand" data-target="#tambah">
                            <i class="fas fa-plus-square"></i> &nbsp Tambah Data Obat
                        </button>
                        <hr>
                        <p>Stok obat dibawah atau sama dengan 10 bertanda merah yang artinya harus di restock ulang <span style="color: red;">*</span></p>
                        <div class="row" style="margin-top: 20px;">
                            <table id="obat" class="table table-bordered nowrap outage-report" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">NO.</th>
                                        <th class="text-center">NAMA OBAT</th>
                                        <th class="text-center">KATEGORI OBAT</th>
                                        <th class="text-center">KUANTITI</th>
                                        <th class="text-center">SATUAN</th>
                                        <th class="text-center">EXPIRED DATE</th>
                                        <th class="text-center">KEGUNAAN</th>
                                        <th class="text-center"> ACTION </th>
                                    </tr>
                                </thead>
                                <tbody class="example">
                                    <?php $no = 1;
                                    foreach ($obat as $row) {
                                    ?>
                                        <tr>
                                            <td align="center"><?= $no++; ?></td>
                                            <td align="center"><?= $row->nama_obat; ?></td>
                                            <td align="center"><?= $row->nama_kategori; ?></td>
                                            <td align="center" <?= $row->qty <= 10 ? 'style="background-color:red;"' : '' ?>><?= $row->qty; ?></td>
                                            <td align="center"><?= $row->satuan; ?></td>
                                            <td align="center"><?= date('d-m-Y', strtotime($row->expired_date)); ?></td>
                                            <td align="center"><?= $row->kegunaan_obat; ?></td>
                                            <td align="center" style="color: #73e600;">
                                                <a href="#update<?= $row->id_obat ?>" data-toggle="modal" class="btn-animation" data-animation="rubberBand"> <button class="btn btn-primary" title="Edit"><i class="ti-pencil-alt"></i></button></a>
                                                <a href="#delete<?= $row->id_obat ?>" data-toggle="modal" class="btn-animation" data-animation="rubberBand"> <button class="btn btn-danger" title="Delete"><i class="ti-trash"></i></button> </a>
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
                <h5 class="modal-title" id="exampleModalLongTitle-1">Tambah Data Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url() ?>Admin/tambahObat" enctype="multipart/form-data" class="cmxform form-horizontal style-form">

                <div class="modal-body">
                    <div class="col-lg-12">
                        <label for="nama_obat" class="control-label">Nama Obat<br>
                        </label>
                        <input class="form-control" id="nama_obat" name="nama_obat" type="text" required autocomplete="off">
                    </div>

                    <div class="col-lg-12">
                        <label for="id_kategori_obat" class="control-label">Kategori<br>
                        </label>
                        <select class="select2 form-control mb-3 custom-select" id="id_kategori_obat" name="id_kategori_obat" style="width: 100%; height:36px;">
                            <option>Select a Kategori</option>
                            <?php foreach ($kategori as $raw) { ?>
                                <option value="<?= $raw->id_kategori_obat ?>"><?= $raw->nama_kategori ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-lg-12">
                        <label for="kegunaan_obat" class="control-label">Kegunaan Obat<br>
                        </label>
                        <input class="form-control" id="kegunaan_obat" name="kegunaan_obat" type="text" required autocomplete="off">
                    </div>

                    <div class="col-lg-12">
                        <label for="qty" class="control-label">Kuantiti<br>
                        </label>
                        <input class="form-control" id="qty" name="qty" type="number" required autocomplete="off">
                    </div>

                    <div class="col-lg-12">
                        <label for="satuan" class="control-label">Satuan<br>
                        </label>
                        <select class="select2 form-control mb-3 custom-select" id="satuan" name="satuan" style="width: 100%; height:36px;">
                            <option>Select a Satuan</option>
                            <option value="Strip">Strip</option>
                            <option value="Botol">Botol</option>
                            <option value="PCS">PCS</option>
                            <option value="LITER">LITER</option>
                        </select>
                    </div>

                    <div class="col-lg-12 mt-2">
                        <label for="expired_date" class="control-label">Epired Date<br>
                        </label>
                        <input type="text" class="form-control" name="expired_date" id="expired_date" placeholder="Epired Date" required autocomplete="off" />
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

<?php foreach ($obat as $row) { ?>
    <div class="modal animation-modal fade" id="update<?= $row->id_obat ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle-1">Edit Data Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url() ?>Admin/editObat" enctype="multipart/form-data" class="cmxform form-horizontal style-form">

                    <div class="modal-body">
                        <div class="col-lg-12">
                            <label for="nama_obat" class="control-label">Nama Obat<br>
                            </label>
                            <input type="hidden" name="id" value="<?= $row->id_obat ?>">
                            <input class="form-control" id="nama_obat" name="nama_obat" type="text" value="<?= $row->nama_obat ?>" required autocomplete="off">
                        </div>

                        <div class="col-lg-12">
                            <label for="id_kategori_obat" class="control-label">Kategori<br>
                            </label>
                            <select class="select2 form-control mb-3 custom-select" id="id_kategori_obat_edit" name="id_kategori_obat" style="width: 100%; height:36px;">
                                <option>Select a Kategori</option>
                                <?php foreach ($kategori as $raw) { ?>
                                    <option value="<?= $raw->id_kategori_obat ?>" <?= $raw->id_kategori_obat == $row->id_kategori_obat ? 'selected' : '' ?>><?= $raw->nama_kategori ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-lg-12">
                            <label for="kegunaan_obat" class="control-label">Kegunaan Obat<br>
                            </label>
                            <input class="form-control" id="kegunaan_obat" name="kegunaan_obat" type="text" value="<?= $row->kegunaan_obat ?>" required autocomplete="off">
                        </div>

                        <div class="col-lg-12">
                            <label for="qty" class="control-label">Kuantiti<br>
                            </label>
                            <input class="form-control" id="qty" name="qty" type="number" value="<?= $row->qty ?>" required autocomplete="off">
                        </div>

                        <div class="col-lg-12">
                            <label for="satuan" class="control-label">Satuan<br>
                            </label>
                            <select class="select2 form-control mb-3 custom-select" id="satuan_edit" name="satuan" style="width: 100%; height:36px;">
                                <option>Select a Satuan</option>
                                <option value="Strip" <?= $row->satuan == 'Strip' ? 'selected' : '' ?>>Strip</option>
                                <option value="Botol" <?= $row->satuan == 'Botol' ? 'selected' : '' ?>>Botol</option>
                                <option value="PCS" <?= $row->satuan == 'PCS' ? 'selected' : '' ?>>PCS</option>
                                <option value="LITER" <?= $row->satuan == 'LITER' ? 'selected' : '' ?>>LITER</option>
                            </select>
                        </div>

                        <div class="col-lg-12 mt-2">
                            <label for="expired_date" class="control-label">Epired Date<br>
                            </label>
                            <input type="text" class="form-control" name="expired_date" id="expired_date_edit" value="<?= date('d-m-Y', strtotime($row->expired_date)) ?>" placeholder="Epired Date" required autocomplete="off" />
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

<?php foreach ($obat as $row) { ?>
    <div class="modal animation-modal fade" id="delete<?= $row->id_obat ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle-1">Delete Nama Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Admin/deleteObat') ?>" method="POST">
                    <div class="modal-body">
                        <div class="p-h-10">
                            <div class="form-group text-center">
                                <i class="fa fa-trash" style="color: red;"></i>
                                <label class="control-label">Anda Yakin Ingin Menghapus Data?</label>
                                <input id="id" type="hidden" name="id" value="<?= $row->id_obat ?>" />
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

<!-- Required datatable js -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url(); ?>assets/pages/datatables.init.js"></script>


<script>
    $('#id_kategori_obat').select2({
        placeholder: "Select a Kategori",
        allowClear: true,
    });

    $('#satuan').select2({
        placeholder: "Select a Satuan",
        allowClear: true,
    });

    $('#id_kategori_obat_edit').select2({
        placeholder: "Select a Kategori",
        allowClear: true,
    });

    $('#satuan_edit').select2({
        placeholder: "Select a Satuan",
        allowClear: true,
    });

    $('#expired_date').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false,
        format: 'DD-MM-YYYY'
    });

    $('#expired_date_edit').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false,
        format: 'DD-MM-YYYY'
    });

    $('#obat').DataTable({
        scrollX: true,
        scrollY: 200,
    });
</script>