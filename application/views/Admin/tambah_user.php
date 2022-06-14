<div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-data-info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin/Data_Kunjungan_Berobat">Data User</a></li>
                    <li class="breadcrumb-item active">Tambah Data User</li>
                </ol>
            </div>
            <h4 class="page-title">Tambah Data User</h4>
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
                        <h4 style="text-align: center;">Tambah Data User</h4>
                        <hr>
                        <form action="<?= base_url() ?>Admin/simpanUser" enctype="multipart/form-data" method="POST" id="SimpanData">
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <h6 class="input-title mt-0">NIK <span style="color: red;">*</span></h6>
                                    <select class="form-control" id="nik" name="id_karyawan" style="width: 100%; height:36px;" required onchange="show_karyawan(this.value)">
                                        <option>Select a NIK</option>
                                        <?php foreach ($karyawan as $row) { ?>
                                            <option value="<?= $row->id_karyawan ?>"><?= $row->nik ?> || <?= $row->nama_karyawan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-12 mt-2">
                                    <h6 class="input-title mt-0">Nama Karyawan <span style="color: red;">*</span></h6>
                                    <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" readonly required>
                                </div>
                                <div class="col-12 mt-2">
                                    <h6 class="input-title mt-0">Jabatan <span style="color: red;">*</span></h6>
                                    <input type="text" id="jabatan" class="form-control" readonly required>
                                    <input type="hidden" name="id_jabatan" id="id_jabatan" class="form-control" readonly required>
                                </div>
                                <div class="col-12 mt-2">
                                    <h6 class="input-title mt-0">Departement <span style="color: red;">*</span></h6>
                                    <input type="text" id="departement" class="form-control" readonly required>
                                    <input type="hidden" name="id_departement" id="id_departement" class="form-control" readonly required>
                                </div>
                                <div class="col-12 mt-2">
                                    <h6 class="input-title mt-0">Hak Akses <span style="color: red;">*</span></h6>
                                    <select class="select2 form-control mb-3 custom-select" name="role" style="width: 100%; height:36px;" required>
                                        <option>Select a Role</option>
                                        <option value="Admin">Admin</option>
                                        <option value="HO">Head HSE</option>
                                    </select>
                                </div>
                                <div class="col-12 mt-2">
                                    <h6 class="input-title mt-0">Email <span style="color: red;">*</span></h6>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="col-12 mt-2">
                                    <h6 class="input-title mt-0">No Telphone <span style="color: red;">*</span></h6>
                                    <input type="text" name="no_telp" class="form-control" required>
                                </div>
                                <div class="col-12 mt-2">
                                    <h6 class="input-title mt-0">Foto <span style="color: red;">*</span></h6>
                                    <input type="file" name="foto" class="form-control">
                                </div>
                                <div class="col-12 mt-2">
                                    <h6 class="input-title mt-0">Password <span style="color: red;">*</span></h6>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
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

<script>
    $('#nik').select2({
        placeholder: "Select a NIK",
        allowClear: true,
        theme: "classic",
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
                console.log(value.data.nama_karyawan);
                if (value.status == true) {
                    id_karyawan = value.data.id_karyawan;
                    $('#nama_karyawan').val(value.data.nama_karyawan);
                    $('#id_karyawan').val(value.data.id_karyawan);
                    $('#jabatan').val(value.data.nama_jabatan);
                    $('#id_jabatan').val(value.data.id_jabatan);
                    $('#departement').val(value.data.nama_departement);
                    $('#id_departement').val(value.data.id_departement);
                }
            }
        });
    }
</script>