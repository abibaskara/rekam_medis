<div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-data-info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin/Data_Kunjungan_Berobat">Data Kunjungan Berobat</a></li>
                    <li class="breadcrumb-item active">Detail Data Kunjungan Berobat</li>
                </ol>
            </div>
            <h4 class="page-title">Detail Data Kunjungan Berobat</h4>
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
                        <h4 style="text-align: center;">Riwayat Kunjungan Berobat Pasien</h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <table id="datatable" class="table table-bordered nowrap outage-report" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NO.</th>
                                            <th class="text-center">TGL</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">NAMA</th>
                                            <th class="text-center">KELUHAN</th>
                                            <th class="text-center">DIAGNOSA</th>
                                            <th class="text-center"> DETAIL OBAT </th>
                                        </tr>
                                    </thead>
                                    <tbody class="example">
                                        <?php $no = 1;
                                        foreach ($kunjungan_berobat as $row) {
                                        ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td align="center"><?= date('d/m/Y', strtotime($row->tgl)); ?></td>
                                                <td align="center"><?= $row->nik; ?></td>
                                                <td align="center"><?= $row->nama; ?></td>
                                                <td align="center"><?= $row->keluhan; ?></td>
                                                <td align="center"><?= $row->diagnosa; ?></td>
                                                <td align="center" style="color: #73e600;">
                                                    <button id="preview_obat" value="<?= $row->id_obat_pasien ?>" class="btn btn-primary" title="Show"><i class="fas fa-eye"></i></button>
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

<!-- ##########################MODAL################################ -->
<div class="modal animation-modal fade" id="detail_obat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle-1">Detail Obat</h5>
                <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="col-lg-12">
                    <table class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">NAMA OBAT</th>
                                <th class="text-center">QTY</th>
                                <th class="text-center">SATUAN</th>
                            </tr>
                        </thead>
                        <tbody id="detail_obat_pasien">
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


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

<script>
    $('#preview_obat').click(function() {
        var id_obat = $('#preview_obat').val();

        get_detail_obat(id_obat);

        $('#detail_obat').modal({
            backdrop: 'static',
            keyboard: false,
        }, 'show');
    });

    function get_detail_obat(value) {
        $.ajax({
            url: "<?php echo base_url('Admin/get_detail_obat'); ?>",
            type: "GET",
            dataType: "JSON",
            data: {
                id_obat: value,
            },
            success: function(value) {
                $.each(value.data, function(k, v) {
                    var body = `
                                <tr> 
                                <td align="center">${v.nama_obat}</td>
                                <td align="center">${v.kuantiti}</td>
                                <td align="center">${v.satuan}</td>
                                </tr>
                               `
                    $('#detail_obat_pasien').append(body);
                });
            }
        });
    }

    $('#close').click(function() {
        $('#detail_obat_pasien').html("");
        $('#detail_obat').modal('hide');
    });

    $('#batal').click(function() {
        $('#detail_obat_pasien').html("");
        $('#detail_obat').modal('hide');
    });
</script>