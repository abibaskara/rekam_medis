<div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-data-info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Kunjungan Berobat</li>
                </ol>
            </div>
            <h4 class="page-title">Data Kunjungan Berobat</h4>
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
                        <h4 style="text-align: center;">Data Kunjungan Berobat</h4>
                        <hr>
                        <a href="<?= base_url(); ?>Admin/Tambah_Data_Kunjungan_Berobat"><button class="btn btn-success btn-theme03">
                                <i class="fas fa-plus-square"></i> &nbsp Tambah Data Kunjungan Berobat
                            </button></a>

                        <div class="row" style="margin-top: 20px;">
                            <table id="datatable" class="table table-bordered nowrap outage-report" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">NO.</th>
                                        <th class="text-center">NIK</th>
                                        <th class="text-center">NAMA</th>
                                        <th class="text-center">DIAGNOSA</th>
                                        <th class="text-center">TGL</th>
                                        <th class="text-center"> ACTION </th>
                                    </tr>
                                </thead>
                                <tbody class="example">
                                    <?php $no = 1;
                                    foreach ($kunjungan_berobat as $row) {
                                    ?>
                                        <tr>
                                            <td align="center"><?= $no++; ?></td>
                                            <td align="center"><?= $row->nik; ?></td>
                                            <td align="center"><?= $row->nama; ?></td>
                                            <td align="center"><?= $row->diagnosa; ?></td>
                                            <td align="center"><?= date('d-m-Y', strtotime($row->tgl)); ?></td>
                                            <td align="center" style="color: #73e600;">
                                                <a href="<?= base_url('Admin/Detail_Data_Kunjungan_Berobat/') . $row->nik ?>"> <button class="btn btn-primary" title="Show"><i class="fas fa-eye"></i></button></a>
                                                <a href="<?= base_url('Admin/Edit_Kunjungan_Berobat/') . $row->id_kunjungan_berobat ?>"> <button class="btn btn-warning" title="Edit"><i class="ti-pencil-alt"></i></button></a>
                                                <a href="#delete<?= $row->id_kunjungan_berobat ?>" data-toggle="modal" class="btn-animation" data-animation="rubberBand"> <button class="btn btn-danger" title="Delete"><i class="ti-trash"></i></button> </a>
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

<!-- #########################MODAL#################################### -->
<?php foreach ($kunjungan_berobat as $row) { ?>
    <div class="modal animation-modal fade" id="delete<?= $row->id_kunjungan_berobat ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle-1">Delete Data Kunjungan Berobat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Admin/deleteKunjunganBerobat') ?>" method="POST">
                    <div class="modal-body">
                        <div class="p-h-10">
                            <div class="form-group text-center">
                                <i class="fa fa-trash" style="color: red;"></i>
                                <label class="control-label">Anda Yakin Ingin Menghapus Data?</label>
                                <input type="hidden" name="id_kunjungan_berobat" value="<?= $row->id_kunjungan_berobat ?>" />
                                <input type="hidden" name="id_obat_pasien" value="<?= $row->id_obat_pasien ?>" />
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