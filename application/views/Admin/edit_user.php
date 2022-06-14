<div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-data-info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>Admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>Admin/User">Data User</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
            <h4 class="page-title">Profile</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Profile</h4>

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
                                            <img src="<?= base_url(); ?>assets/profile/<?= $user['foto']; ?>" alt="" class="thumb-lg rounded-circle">
                                            <div class="media-body ml-2 align-self-center">
                                                <p class="mb-0"><?= $user['nama_karyawan']; ?></p>
                                                <span class="font-12 text-light"><?= $user['nama_jabatan']; ?></span>
                                            </div>
                                        </div>
                                        <hr>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Departement
                                                    </td>
                                                    <td>
                                                        : <?= $user['nama_departement']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Division
                                                    </td>
                                                    <td>
                                                        : <?= $user['divisi']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Jabatan
                                                    </td>
                                                    <td>
                                                        : <?= $user['nama_jabatan']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Email
                                                    </td>
                                                    <td>
                                                        : <?= $user['email']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        No Phone
                                                    </td>
                                                    <td>
                                                        : <?= $user['no_hp']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        No Telephone
                                                    </td>
                                                    <td>
                                                        : <?= $user['no_telp']; ?>
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
                        <form role="form" action="<?= base_url() ?>Admin/updateUser" enctype="multipart/form-data" method="POST" class="form-horizontal">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?= $user['id_user'] ?>">
                                    <input type="hidden" name="old_foto" value="<?= $user['foto'] ?>">
                                    <input class="form-control" type="text" value="<?= $user['nik']; ?>" id="example-text-input" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Nama Karyawan</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?= $user['nama_karyawan']; ?>" id="example-text-input" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?= $user['nama_jabatan']; ?>" id="example-text-input" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Departement</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?= $user['nama_departement']; ?>" id="example-text-input" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Hak Akses</label>
                                <div class="col-sm-10">
                                    <select class="form-control mb-3" name="role" id="hak_user" style="width: 100%; height:36px;" required>
                                        <option>Select a Role</option>
                                        <option value="Admin" <?= $user['role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                        <option value="HO" <?= $user['role'] == 'HO' ? 'selected' : '' ?>>Head HSE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" name="email" value="<?= $user['email']; ?>" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">No Telephone</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="no_telp" value="<?= $user['no_telp']; ?>" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="foto" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Change Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="password" id="example-text-input">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">

                                </div>
                                <div class="col-sm-10">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn btn-danger" type="button">Cancel</button>
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
    $('#hak_user').select2({
        placeholder: "Select a Role",
        allowClear: true,
    });
</script>