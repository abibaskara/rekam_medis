<div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-data-info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Laporan Kunjungan Pasien</li>
                </ol>
            </div>
            <h4 class="page-title">Laporan Kunjungan Pasien</h4>
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
                        <h4 style="text-align: center;">Laporan Kunjungan Pasien</h4>
                        <hr>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <h6 class="input-title mt-0">NIK <span style="color: red;">*</span></h6>
                                <select class="form-control mb-3" id="nik" name="id_karyawan" style="width: 100%; height:36px;" onchange="show_karyawan(this.value)" required>
                                    <option>Select a NIK</option>
                                    <?php foreach ($data_karyawan as $row) { ?>
                                        <option value=" <?= $row->id_karyawan ?>"><?= $row->nik ?> || <?= $row->nama_karyawan ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 mt-2">
                                <h6 class="input-title mt-0">Nama <span style="color: red;">*</span></h6>
                                <input type="text" id="nama_karyawan" class="form-control" readonly required>
                            </div>

                            <div class="col-10 mt-2">
                                <h6 class="input-title mt-0">Range Tanggal <span style="color: red;">*</span></h6>
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="tgl_awal" id="tgl_awal" placeholder="Tanggal Awal" required autocomplete="off" />
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="tgl_akhir" id="tgl_akhir" placeholder="Tanggal Awal" required autocomplete="off" />
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <button class="btn" type="button" id="preview"><i class="fas fa-search"></i> Preview</button>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-dark" type="button" id="print" style="margin-left: 10px;"><i class="fas fa-print"></i> Print</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div id="doc_print">
                            <div class="row">
                                <div class="col-12 mt-3" id="header-print">
                                </div>

                                <div class="col-12 mt-4" id="tampil_preview_kunjungan_berobat">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

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
    $(document).ready(function() {
        $("#nik").select2({
            allowClear: true,
            placeholder: "Select a NIK",
        });

        $('#preview').on('click', function(e) {
            var id_karyawan = $('#nik').val();
            var tgl_awal = $('#tgl_awal').val();
            var tgl_akhir = $('#tgl_akhir').val();
            show_header(id_karyawan);
            show_preview(id_karyawan, tgl_awal, tgl_akhir);
        });
        var tampil_preview_kunjungan_berobat = document.getElementById("tampil_preview_kunjungan_berobat")
        tampil_preview_kunjungan_berobat.style.display = "none"
        var tampil_print = document.getElementById("print")
        tampil_print.style.display = "none"

        $('#tgl_awal').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false,
            format: 'DD-MM-YYYY'
        });
        $('#tgl_akhir').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false,
            format: 'DD-MM-YYYY'
        });

        $("#preview").click(function() {
            tampil_preview_kunjungan_berobat.style.display = "block"
            tampil_print.style.display = "block"
        });

        $('#table_preview').DataTable({
            scrollX: true,
            scrollY: 200,
        });

        $("#print").click(function() {
            var divToPrint = document.getElementById('doc_print');

            var newWin = window.open('', 'Print-Window');

            newWin.document.open();

            newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

            newWin.document.close();

            setTimeout(function() {
                newWin.close();
            }, 10);
        });
    });

    function show_karyawan(value) {
        $.ajax({
            url: "<?php echo base_url('Admin/get_karyawan'); ?>",
            type: "GET",
            dataType: "JSON",
            data: {
                id_karyawan: value
            },
            success: function(value) {
                if (value.status == true) {
                    id_karyawan = value.data.id_karyawan;
                    $('#nama_karyawan').val(value.data.nama_karyawan);
                }
            }
        });
    }

    function show_preview(id_karyawan, tgl_awal, tgl_akhir) {

        $.ajax({
            url: "<?php echo base_url('Admin/get_laporan_kunjungan_pasien'); ?>",
            type: "GET",
            dataType: "JSON",
            data: {
                id_karyawan: id_karyawan,
                tgl_awal: tgl_awal,
                tgl_akhir: tgl_akhir,
            },

            success: function(value) {
                var title = "Kunjungan Berobat Terdahulu"
                $('#tampil_preview_kunjungan_berobat').html(`
                            <hr>
                            <h5 style="text-align: center;"> Catatan Rekam Medis ${title}</h5>
                            <hr>
                            <table class='table table-striped mb-0' style='width:100%;'>
                            <thead>
                            <tr>
                            <th scope='col' style='text-align: center;'>NIK</th>
                            <th scope='col' style='text-align: center;'>NAMA</th>
                            <th scope='col' style='text-align: center;'>KELUHAN</th>
                            <th scope='col' style='text-align: center;'>DIAGNOSA</th>
                            <th scope='col' style='text-align: center;'>TGL</th>
                            </tr>
                            </thead>
                            <tbody id='preview_kunjungan_berobat'>
                            </tbody>
                            </table>
                            `);
                $.each(value.kunjungan_berobat, function(k, v) {
                    console.log(v);
                    var body = `
                                <tr> 
                                <td align="center">${v.nik}</td>
                                <td align="center">${v.nama}</td>
                                <td align="center">${v.keluhan}</td>
                                <td align="center">${v.diagnosa}</td>
                                <td align="center">${v.tgl}</td>
                                </tr>
                               `
                    $('#preview_kunjungan_berobat').html(body);
                });
            }
        });
    }

    function show_header(id_karyawan) {
        $.ajax({
            url: "<?php echo base_url('Admin/get_header_print'); ?>",
            type: "GET",
            dataType: "JSON",
            data: {
                id_karyawan: id_karyawan,
            },

            success: function(value) {
                $('#header-print').html(`
                            <h5 style="text-align: center;"> Detail Data Pasien</h5>
                            <hr>
                            <table class='table table-striped mb-0'>
                            <tbody>
                                <tr>
                                    <td>NIK
                                    </td>
                                    <td>: ${value.data.nik}
                                    </td>
                                </tr>
                                <tr>
                                    <td>NAMA KARYAWAN
                                    </td>
                                    <td>: ${value.data.nama_karyawan}
                                    </td>
                                </tr>
                                <tr>
                                    <td>TEMPAT LAHIR
                                    </td>
                                    <td>: ${value.data.tempat_lahir}
                                    </td>
                                </tr>
                                <tr>
                                    <td>TANGGAL LAHIR
                                    </td>
                                    <td>: ${value.data.tgl_lahir}
                                    </td>
                                </tr>
                                <tr>
                                    <td>ALAMAT
                                    </td>
                                    <td>: ${value.data.alamat}
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                            `);
                var header_print = document.getElementById("header-print")
                header_print.style.display = "block"
            }
        });
    }
</script>