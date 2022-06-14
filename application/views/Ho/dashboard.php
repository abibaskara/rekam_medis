<div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-data-info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="icon-contain">
                            <div class="row">
                                <div class="col-2 align-self-center">
                                    <i class="fas fa-tasks text-gradient-success"></i>
                                </div>
                                <div class="col-10 text-right">
                                    <h5 class="mt-0 mb-1"><?= $kunjungan_berobat['Total'] ?></h5>
                                    <p class="mb-0 font-12 text-muted">Kunjungan Berobat</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body justify-content-center">
                        <div class="icon-contain">
                            <div class="row">
                                <div class="col-2 align-self-center">
                                    <i class="fas fa-tasks text-gradient-danger"></i>
                                </div>
                                <div class="col-10 text-right">
                                    <h5 class="mt-0 mb-1"><?= $mcu['Total'] ?></h5>
                                    <p class="mb-0 font-12 text-muted">Medical Check Up</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="icon-contain">
                            <div class="row">
                                <div class="col-2 align-self-center">
                                    <i class="fas fa-tasks text-gradient-warning"></i>
                                </div>
                                <div class="col-10 text-right">
                                    <h5 class="mt-0 mb-1"><?= $skd['Total'] ?></h5>
                                    <p class="mb-0 font-12 text-muted">Surat Keterangan Dokter</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="card">
            <div class="card-body">
                <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                    <label class="btn btn-primary btn-sm active">
                        <input type="radio" name="options" id="option1" checked=""> This Week
                    </label>
                    <label class="btn btn-primary btn-sm">
                        <input type="radio" name="options" id="option2"> Last Month
                    </label>
                </div>
                <h5 class="header-title mb-4 mt-0">Weekly Record</h5>
                <canvas id="lineChart" height="82"></canvas>
            </div>
        </div> -->
    </div>
</div>

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>