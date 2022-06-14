<div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-data-info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin/Medical_Check_Up">Data Medical Check Up</a></li>
                    <li class="breadcrumb-item active">Detail Data Medical Check Up</li>
                </ol>
            </div>
            <h4 class="page-title">Detail Data Medical Check Up</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 style="text-align: center;">Detail Data Pasien</h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <table style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p>NIK</p>
                                            </td>
                                            <td>
                                                <p>: <?= $ket_pasien['nik'] ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Nama Karyawan</p>
                                            </td>
                                            <td>
                                                <p>: <?= $ket_pasien['nama_karyawan'] ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Jabatan</p>
                                            </td>
                                            <td>
                                                <p>: <?= $ket_pasien['nama_jabatan'] ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Departement</p>
                                            </td>
                                            <td>
                                                <p>: <?= $ket_pasien['nama_departement'] ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Divisi</p>
                                            </td>
                                            <td>
                                                <p>: <?= $ket_pasien['divisi'] ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Alamat</p>
                                            </td>
                                            <td>
                                                <p>: <?= $ket_pasien['alamat'] ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>No Handphone</p>
                                            </td>
                                            <td>
                                                <p>: <?= $ket_pasien['no_hp'] ?></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 style="text-align: center;">Riwayat Surat Keterangan Dokter Pasien</h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <table id="detail_mcu" class="table table-bordered nowrap outage-report" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NO.</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">NAMA</th>
                                            <th class="text-center">WAKTU MCU</th>
                                            <th class="text-center"> ACTION </th>
                                        </tr>
                                    </thead>
                                    <tbody class="example">
                                        <?php $no = 1;
                                        foreach ($mcu as $row) {
                                        ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td align="center"><?= $row->nik; ?></td>
                                                <td align="center"><?= $row->nama_karyawan; ?></td>
                                                <td align="center"><?= date('d-m-Y', strtotime($row->waktu_mcu)); ?></td>
                                                <td align="center" style="color: #73e600;">
                                                    <a href="#preview_mcu<?= $row->id_mcu ?>" data-toggle="modal" class="btn-animation" data-animation="rubberBand"> <button class="btn btn-primary" title="Show"><i class="fas fa-eye"></i></button> </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($mcu as $row) { ?>
    <div class="modal animation-modal fade" id="preview_mcu<?= $row->id_mcu ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle-1">Detail Medical Check Up</h5>
                    <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="col-lg-12">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td>
                                        NIK
                                    </td>
                                    <td>: <?= $row->nik ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        NAMA
                                    </td>
                                    <td>
                                        : <?= $row->nama_karyawan ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        FASILITATOR MCU
                                    </td>
                                    <td>
                                        : <?= $row->fasilitator_mcu ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        WAKTU MCU
                                    </td>
                                    <td>
                                        : <?= date('d-m-Y', strtotime($row->waktu_mcu)) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        TEKANAN DARAH
                                    </td>
                                    <td>
                                        : <?= $row->tekanan_darah ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Hasil Pemeriksaan Dokter
                                    </td>
                                    <td>
                                        : <?= $row->hasil_pemeriksaan_dokter ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Hasil Lab Urin
                                    </td>
                                    <td>
                                        : <?= $row->hasil_lab_urin ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Hasil Rontgen Thorak
                                    </td>
                                    <td>
                                        : <?= $row->hasil_rontgen_thorak ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Hasil Peeriksaan Mata
                                    </td>
                                    <td>
                                        : <?= $row->hasil_pemeriksaan_mata ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Hasil Pemeriksaan Pendengaran
                                    </td>
                                    <td>
                                        : <?= $row->hasil_pemeriksaan_pendengaran ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="batal" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url(); ?>assets/pages/datatables.init.js"></script>

<script>
    $('#detail_mcu').DataTable({
        scrollX: true,
        scrollY: 200,
    });
</script>