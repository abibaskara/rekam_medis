<div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-data-info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Jabatan</li>
                </ol>
            </div>
            <h4 class="page-title">Data Jabatan</h4>
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
                        <h4 style="text-align: center;">Data Jabatan</h4>
                        <hr>
                        <button class="btn btn-success btn-theme03 btn-animation" data-toggle="modal" data-animation="rubberBand" data-target="#tambah">
                            <i class="fas fa-plus-square"></i> &nbsp Tambah Data Jabatan
                        </button>

                        <div class="row" style="margin-top: 20px;">
                            <table id="datatable" class="table table-bordered nowrap outage-report" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">NO.</th>
                                        <th class="text-center">NAMA JABATAN</th>
                                        <th class="text-center"> ACTION </th>
                                    </tr>
                                </thead>
                                <tbody class="example">
                                    <?php $no = 1;
                                    foreach ($jabatan as $row) {
                                    ?>
                                        <tr>
                                            <td align="center"><?= $no++; ?></td>
                                            <td align="center"><?= $row->nama_jabatan; ?></td>
                                            <td align="center" style="color: #73e600;">
                                                <a href="#update<?= $row->id_jabatan ?>" data-toggle="modal" class="btn-animation" data-animation="rubberBand"> <button class="btn btn-primary" title="Edit"><i class="ti-pencil-alt"></i></button></a>
                                                <a href="#delete<?= $row->id_jabatan ?>" data-toggle="modal" class="btn-animation" data-animation="rubberBand"> <button class="btn btn-danger" title="Delete"><i class="ti-trash"></i></button> </a>
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
<div class="modal animation-modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle-1">Tambah Data Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url() ?>Admin/tambahJabatan" enctype="multipart/form-data" class="cmxform form-horizontal style-form">

                <div class="modal-body">
                    <div class="col-lg-12">
                        <label for="nama_jabatan" class="control-label">Nama Jabatan<br>
                        </label>
                        <input class="form-control" id="nama_jabatan" name="nama_jabatan" type="text" required autocomplete="off">
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

<?php foreach ($jabatan as $row) { ?>
    <div class="modal animation-modal fade" id="update<?= $row->id_jabatan ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle-1">Edit Data Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url() ?>Admin/editJabatan" enctype="multipart/form-data" class="cmxform form-horizontal style-form">

                    <div class="modal-body">
                        <div class="col-lg-12">
                            <label for="nama_jabatan" class="control-label">Nama Jabatan<br>
                            </label>
                            <input type="hidden" name="id" value="<?= $row->id_jabatan ?>">
                            <input class="form-control" id="nama_jabatan" name="nama_jabatan" value="<?= $row->nama_jabatan ?>" type="text" required autocomplete="off">
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

<?php foreach ($jabatan as $row) { ?>
    <div class="modal animation-modal fade" id="delete<?= $row->id_jabatan ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle-1">Delete Nama Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Admin/deleteJabatan') ?>" method="POST">
                    <div class="modal-body">
                        <div class="p-h-10">
                            <div class="form-group text-center">
                                <i class="fa fa-trash" style="color: red;"></i>
                                <label class="control-label">Anda Yakin Ingin Menghapus Data?</label>
                                <input id="id" type="hidden" name="id" value="<?= $row->id_jabatan ?>" />
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

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>