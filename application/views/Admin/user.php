<div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-data-info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin">Dashboard</a></li>
                    <li class=" breadcrumb-item active">Data User</li>
                </ol>
            </div>
            <h4 class="page-title">Data User</h4>
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
                        <h4 style="text-align: center;">Data User</h4>
                        <hr>
                        <a href="<?= base_url(); ?>Admin/tambahUser"><button class="btn btn-success btn-theme03">
                                <i class="fas fa-plus-square"></i> &nbsp Tambah Data User
                            </button></a>

                        <div class="row" style="margin-top: 20px;">
                            <table id="user" class="table table-bordered nowrap outage-report" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">NO.</th>
                                        <th class="text-center">NIK</th>
                                        <th class="text-center">NAMA KARYAWAN</th>
                                        <th class="text-center">JABATAN</th>
                                        <th class="text-center">DEPARTEMENT</th>
                                        <th class="text-center">HAK AKSES</th>
                                        <th class="text-center">EMAIL</th>
                                        <th class="text-center">NO HP</th>
                                        <th class="text-center">FOTO</th>
                                        <th class="text-center"> ACTION </th>
                                    </tr>
                                </thead>
                                <tbody class="example">
                                    <?php $no = 1;
                                    foreach ($user as $row) {
                                    ?>
                                        <tr>
                                            <td align="center"><?= $no++; ?></td>
                                            <td align="center"><?= $row->nik; ?></td>
                                            <td align="center"><?= $row->nama_karyawan; ?></td>
                                            <td align="center"><?= $row->nama_jabatan; ?></td>
                                            <td align="center"><?= $row->nama_departement; ?></td>
                                            <td align="center"><?= $row->role; ?></td>
                                            <td align="center"><?= $row->email; ?></td>
                                            <td align="center"><?= $row->no_hp; ?></td>
                                            <td align="center"><img src="<?= base_url(); ?>assets/profile/<?= $row->foto ?>" alt="Profile" width="50px" height="50px"></td>
                                            <td align="center" style="color: #73e600;">
                                                <a href="<?= base_url('Admin/editUser/') . $row->id_user; ?>"> <button class="btn btn-primary" title="Edit"><i class="ti-pencil-alt"></i></button></a>
                                                <a href="#delete<?= $row->id_user ?>" data-toggle="modal" class="btn-animation" data-animation="rubberBand"> <button class="btn btn-danger" title="Delete"><i class="ti-trash"></i></button> </a>
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
<?php foreach ($user as $row) { ?>
    <div class="modal animation-modal fade" id="delete<?= $row->id_user ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle-1">Delete Nama Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Admin/deleteUser') ?>" method="POST">
                    <div class="modal-body">
                        <div class="p-h-10">
                            <div class="form-group text-center">
                                <i class="fa fa-trash" style="color: red;"></i>
                                <label class="control-label">Anda Yakin Ingin Menghapus Data?</label>
                                <input type="hidden" name="id" value="<?= $row->id_user ?>" />
                                <input type="hidden" name="foto" value="<?= $row->foto ?>" />
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

<!-- Required datatable js -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url(); ?>assets/pages/datatables.init.js"></script>


<script>
    $('#user').DataTable({
        scrollX: true,
        scrollY: 200,
    });
</script>