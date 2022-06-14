<div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-data-info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin/Surat_Keterangan_Dokter">Data Surat Keterangan Dokter</a></li>
                    <li class="breadcrumb-item active">Detail Data Surat Keterangan Dokter</li>
                </ol>
            </div>
            <h4 class="page-title">Detail Data Surat Keterangan Dokter</h4>
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
                                <table id="detail_skd" class="table table-bordered nowrap outage-report" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NO.</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">NAMA</th>
                                            <th class="text-center">TANGGAL MULAI</th>
                                            <th class="text-center">TANGGAL AKHIR</th>
                                            <th class="text-center">DIAGNOSA PENYAKIT</th>
                                            <th class="text-center">TEMPAT BEROBAT</th>
                                        </tr>
                                    </thead>
                                    <tbody class="example">
                                        <?php $no = 1;
                                        foreach ($skd as $row) {
                                        ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td align="center"><?= $row->nik; ?></td>
                                                <td align="center"><?= $row->nama_karyawan; ?></td>
                                                <td align="center"><?= date('d-m-Y', strtotime($row->tanggal_mulai_skd)); ?></td>
                                                <td align="center"><?= date('d-m-Y', strtotime($row->tanggal_akhir_skd)); ?></td>
                                                <td align="center"><?= $row->diagnosa_penyakit; ?></td>
                                                <td align="center"><?= $row->tempat_berobat; ?></td>
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
    $('#detail_skd').DataTable({
        scrollX: true,
        scrollY: 200,
    });
</script>